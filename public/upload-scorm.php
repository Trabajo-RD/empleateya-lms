<?php
define('manifestFile', 'imsmanifest.xml');
define('dataFile', 'data.json');

class ManifestInfo
{
    public $title;
    public $cpv;
    public $rld = false;

    public $organization;
    public $version;
    public $schema;

    public $scormIndex;

    public function __construct(
        $title,
        $cpv,
        $rld,
        $organization,
        $version,
        $schema,
        $scormIndex
    ) {
        $this->title = $title;
        $this->cpv = $cpv;
        $this->rld = $rld;
        $this->organization = $organization;
        $this->version = $version;
        $this->schema = $schema;
        $this->scormIndex = $scormIndex;
    }
}

class CurseRow extends ManifestInfo
{
    public $courseRoot;
}

function getManifestInfo($rootDir): CurseRow
{

    $dom = new DOMDocument();

    // echo $rootDir . DIRECTORY_SEPARATOR . manifestFile;

    $dom->load( $rootDir . DIRECTORY_SEPARATOR . manifestFile);

    $xpath = new DOMXPath($dom);

    $meta = $dom->getElementsByTagName('metadata')->item(0);

    $schemaVersion = '';
    $schema = '';

    if ($meta instanceof DOMElement) {
        $schema = $meta->getElementsByTagName('schema')->item(0)->textContent;
        $schemaVersion = $meta->getElementsByTagName('schemaversion')->item(0)->textContent;
    }

    $org = $dom->getElementsByTagName('organizations')->item(0);


    $itemTitle = '';
    $cpv = '';
    $rld = '';
    $orgTitle = '';
    $scormIndex = '';

    if ($org instanceof DOMElement) {
        $orgAttr = $org->getAttribute('default');

        $defaultOrg = $xpath->query('*[@identifier="' . $orgAttr . '"]', $org)->item(0);

        // echo print_r($defaultOrg);

        if ($defaultOrg instanceof DOMElement) {
            $orgItem = $defaultOrg->getElementsByTagName('item')->item(0);
            $orgTitle = $defaultOrg->getElementsByTagName('title')->item(0)->textContent;
        }


        if ($orgItem instanceof DOMElement) {

            $itemTitle = $orgItem->getElementsByTagName('title')->item(0)->textContent;
            $encoded = $xpath->query('//adlcp:datafromlms', $orgItem)->item(0);


            if ($encoded !== null) {
                $decoded = base64_decode($encoded->textContent);


                $dedecoded = json_decode($decoded);

                $cpv = $dedecoded->cpv;
                $rld = $dedecoded->rld;
            }
        }
    }



    $resource = $dom->getElementsByTagName('resources')->item(0);

    $resource = $xpath->query('*[@identifier="r1"]', $resource)->item(0);


    if ($resource instanceof DOMElement) {
        $scormIndex =  $resource->getAttribute('href');
        // $contentType = $resource->getAttribute('type');
    }

    $manifestInfo = new CurseRow(
        $itemTitle,
        $cpv,
        $rld,
        $orgTitle,
        $schemaVersion,
        $schema,
        $scormIndex
    );

    return $manifestInfo;
}

if (isset($_FILES['file'])) {

    $upload_dir = "/public/storage/scorm" . DIRECTORY_SEPARATOR;

    $file_name = $_FILES["file"]["name"];
    $temp_file_name = $_FILES["file"]["tmp_name"];

    $parts = explode('.', $file_name);

    $file_ex = end($parts);

    $file_name_no_ex = basename($file_name, "." . $file_ex);

    if ($file_ex === 'zip' && isset($_POST["upload"])) {
        $zip = new ZipArchive;

        $arch = $zip->open($temp_file_name);

        if ($arch === true) {
            $extractDir = $upload_dir . $file_name_no_ex;
            // echo $extractDir;
            // echo '<br/><br/><br/><br/><br/>';

            $zip->extractTo($extractDir);

            $row = getManifestInfo($extractDir);

            $row->courseRoot = $file_name_no_ex;

            $json;

            if (file_exists(dataFile)) {
                $fileContent = file_get_contents(dataFile);

                if ($fileContent && strlen($fileContent) > 0) {
                    $json = json_decode($fileContent);
                } else {
                    $json = array('data' => array());
                }
            }

            if (count($json->data) === 0) {
                array_push($json->data, $row);
            } else {
                $found = false;
                $foundIndex = -1;

                // if ($item->cpv !== $row->cpv) {
                //     array_push($json->data, $row);
                // } else {

                //     $json->data[$$index] = $row;
                // }

                array_walk($json->data, function ($item, $index) use ($row, &$found, &$foundIndex) {
                    if ($item->cpv === $row->cpv) {
                        $found = true;
                        $foundIndex = $index;
                    }
                    // print_r($item);
                });

                if ($found)
                    $json->data[$foundIndex] = $row;
                else
                    array_push($json->data, $row);
            }

            // $data = array($row);
            $stored = json_encode($json);

            // echo print_r($stored);

            file_put_contents('data.json',  $stored);
        }


        header("Location: index.php");

        //echo basename($file_name, "." . $file_ex) . '.' . $file_ex;
    }
} else {
    echo '<p>Debe seleccionar un archivo para cargar</p>';
}

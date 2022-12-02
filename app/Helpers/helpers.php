<?php

use App\Models\Scorm;

class ManifestInfo
{
    public $title;
    public $cpv; // adlcp:datafromlms
    // public $rld = false;

    public $organization;
    public $schema_version;
    public $schema;

    public $scormIndex;

    public $identifier;
    public $version;

    public function __construct(
        $title,
        $cpv,
        // $rld,
        $organization,
        $schema_version,
        $schema,
        $scormIndex,
        $identifier,
        $version
    ) {
        $this->title = $title;
        $this->cpv = $cpv;
        // $this->rld = $rld;
        $this->organization = $organization;
        $this->schema_version = $schema_version;
        $this->schema = $schema;
        $this->scormIndex = $scormIndex;
        $this->identifier = $identifier;
        $this->version = $version;
    }
}

class ScormData extends ManifestInfo
{
    public $courseRoot;
}

/**
 * Get data from SCORM package
 *
 * @param [type] $rootDir
 * @param [type] $manifestFile
 * @return object
 */
function getManifestInfo($rootDir, $manifestFile = '') {

    $dom = new DOMDocument();

    // echo $rootDir . DIRECTORY_SEPARATOR . manifestFile;

    $dom->load( $rootDir . DIRECTORY_SEPARATOR . $manifestFile);

    $identifier = $dom->documentElement->getAttribute('identifier');
    $version = $dom->documentElement->getAttribute('version');

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
    // $rld = '';
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
                // $rld = $dedecoded->rld;
            }
        }
    }



    $resource = $dom->getElementsByTagName('resources')->item(0);

    $resource = $xpath->query('*[@identifier="r1"]', $resource)->item(0);


    if ($resource instanceof DOMElement) {
        $scormIndex =  $resource->getAttribute('href');
        // $contentType = $resource->getAttribute('type');
    }

    $manifestInfo = new ScormData(
        $itemTitle,
        $cpv,
        // $rld,
        $orgTitle,
        $schemaVersion,
        $schema,
        $scormIndex,
        $identifier,
        $version
    );

    return $manifestInfo;

}

/**
 * Returns the 'active' class if the current path matches the given path
 *
 * @param [type] $path
 * @return string
 */
function routeIsActive($path) {
    return request()->routeIs($path) ? 'active' : '';
}

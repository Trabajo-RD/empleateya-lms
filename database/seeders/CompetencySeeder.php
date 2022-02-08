<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Competency;

class CompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competencies = [
            [
                'name'  =>  'Competencias Transversales',
                'slug'  =>  Str::slug('Competencias Transversales'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  null,
                'order' =>  null,
                'description'   => 'Compentencias genéricas'
            ],
            [
                'name'  =>  'Competencias Técnicas',
                'slug'  =>  Str::slug('Competencias Técnicas'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  null,
                'order' =>  null,
                'description'   => 'Competencias específicas'
            ],
            [
                'name'  =>  'Espíritu emprendedor e innovador',
                'slug'  =>  Str::slug('Espíritu emprendedor e innovador'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Sostenibilidad y compromiso social',
                'slug'  =>  Str::slug('Sostenibilidad y compromiso social'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Lengua Extranjera',
                'slug'  =>  Str::slug('Lengua Extranjera'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Comunicación eficaz oral y escrita',
                'slug'  =>  Str::slug('Comunicación eficaz oral y escrita'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Trabajo en equipo',
                'slug'  =>  Str::slug('Trabajo en equipo'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Uso solvente de los recursos de información',
                'slug'  =>  Str::slug('Uso solvente de los recursos de información'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Aprendizaje autónomo',
                'slug'  =>  Str::slug('Aprendizaje autónomo'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Actitud frente al trabajo',
                'slug'  =>  Str::slug('Actitud frente al trabajo'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Hábitos de pensamiento',
                'slug'  =>  Str::slug('Hábitos de pensamiento'),
                'icon'  =>  null,
                'value' =>  null,
                'parent_id' =>  1,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Demostrar conocimiento y comprensión de hechos esenciales, conceptos, principios y teorías relativas a la informática y a sus disciplinas de referencia.',
                'slug'  =>  Str::slug('Demostrar conocimiento y comprensión de hechos esenciales, conceptos, principios y teorías relativas a la informática y a sus disciplinas de referencia.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Usar de forma apropiada teorías, procedimientos y herramientas en el desarrollo profesional de la ingeniería informática en todos sus ámbitos (especificación, diseño, implementación, despliegue -implantación- y evaluación de productos) de forma que se demuestre la comprensión de los compromisos adoptados en las decisiones de diseño.',
                'slug'  =>  Str::slug('Usar de forma apropiada teorías, procedimientos y herramientas en el desarrollo profesional de la ingeniería informática en todos sus ámbitos (especificación, diseño, implementación, despliegue -implantación- y evaluación de productos) de forma que se demuestre la comprensión de los compromisos adoptados en las decisiones de diseño.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Identificar tecnologías actuales y emergentes y evaluar si son aplicables, y en qué medida, para satisfacer las necesidades de los usuarios.',
                'slug'  =>  Str::slug('Identificar tecnologías actuales y emergentes y evaluar si son aplicables, y en qué medida, para satisfacer las necesidades de los usuarios.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Demostrar conocimiento y comprensión del contexto económico y organizativo en el que desarrolla su trabajo .',
                'slug'  =>  Str::slug('Demostrar conocimiento y comprensión del contexto económico y organizativo en el que desarrolla su trabajo .'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Usar apropiadamente los principios y las técnicas de interacción persona-ordenador en los proyectos de Tecnologías de la Información y la Comunicación (TIC).',
                'slug'  =>  Str::slug('Usar apropiadamente los principios y las técnicas de interacción persona-ordenador en los proyectos de Tecnologías de la Información y la Comunicación (TIC).'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Encontrar soluciones algorítmicas robustas y correctas a problemas, comprendiendo la idoneidad y complejidad de las soluciones propuestas y las restricciones de tiempo y coste.',
                'slug'  =>  Str::slug('Encontrar soluciones algorítmicas robustas y correctas a problemas, comprendiendo la idoneidad y complejidad de las soluciones propuestas y las restricciones de tiempo y coste.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Programar de forma robusta y correcta teniendo en cuenta restricciones de tiempo y coste.',
                'slug'  =>  Str::slug('Programar de forma robusta y correcta teniendo en cuenta restricciones de tiempo y coste.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Demostrar conocimiento y comprensión del funcionamiento interno de un computador y del funcionamiento de las comunicaciones entre ordenadores',
                'slug'  =>  Str::slug('Demostrar conocimiento y comprensión del funcionamiento interno de un computador y del funcionamiento de las comunicaciones entre ordenadores'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Evaluar sistemas hardware/software en función de un criterio de calidad determinado.',
                'slug'  =>  Str::slug('Evaluar sistemas hardware/software en función de un criterio de calidad determinado.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Analizar, identificar y definir los requisitos que debe cumplir un sistema informático para resolver problemas o conseguir objetivos de organizaciones y personas.',
                'slug'  =>  Str::slug('Analizar, identificar y definir los requisitos que debe cumplir un sistema informático para resolver problemas o conseguir objetivos de organizaciones y personas.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Concebir, valorar, planificar y dirigir proyectos TIC utilizando los principios y metodologías propios de la ingeniería, de gestión de recursos humanos y de economía.',
                'slug'  =>  Str::slug('Concebir, valorar, planificar y dirigir proyectos TIC utilizando los principios y metodologías propios de la ingeniería, de gestión de recursos humanos y de economía.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  2,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de actuar autónomamente.',
                'slug'  =>  Str::slug('Capacidad de actuar autónomamente.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  3,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Tener iniciativa y ser resolutivo.',
                'slug'  =>  Str::slug('Tener iniciativa y ser resolutivo.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  3,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Tener iniciativa para aportar y/o evaluar soluciones alternativas o novedosas a los problemas, demostrando flexibilidad y profesionalidad a la hora de considerar distintos criterios de evaluación.',
                'slug'  =>  Str::slug('Tener iniciativa para aportar y/o evaluar soluciones alternativas o novedosas a los problemas, demostrando flexibilidad y profesionalidad a la hora de considerar distintos criterios de evaluación.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  3,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Actuar en el desarrollo profesional con responsabilidad y ética profesional y de acuerdo con la legislación vigente.',
                'slug'  =>  Str::slug('Actuar en el desarrollo profesional con responsabilidad y ética profesional y de acuerdo con la legislación vigente.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  4,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Considerar el contexto económico y social en las soluciones de ingeniería, siendo consciente de la diversidad y la multiculturalidad, y garantizando la sostenibilidad y el respeto a los derechos humanos.',
                'slug'  =>  Str::slug('Considerar el contexto económico y social en las soluciones de ingeniería, siendo consciente de la diversidad y la multiculturalidad, y garantizando la sostenibilidad y el respeto a los derechos humanos.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  4,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de comunicación efectiva en inglés',
                'slug'  =>  Str::slug('Capacidad de comunicación efectiva en inglés'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  5,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de comunicación efectiva (en expresión y comprensión) oral y escrita, con especial énfasis en la redacción de documentación técnica.',
                'slug'  =>  Str::slug('Capacidad de comunicación efectiva (en expresión y comprensión) oral y escrita, con especial énfasis en la redacción de documentación técnica.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  6,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de comunicación efectiva con el usuario en un lenguaje no técnico y de comprender sus necesidades.',
                'slug'  =>  Str::slug('Capacidad de comunicación efectiva con el usuario en un lenguaje no técnico y de comprender sus necesidades.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  6,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad para argumentar y justificar lógicamente las decisiones tomadas y las opiniones.',
                'slug'  =>  Str::slug('Capacidad para argumentar y justificar lógicamente las decisiones tomadas y las opiniones.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  6,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de integrarse rápidamente y trabajar eficientemente en equipos unidisciplinares y de colaborar en un entorno multidisciplinar.',
                'slug'  =>  Str::slug('Capacidad de integrarse rápidamente y trabajar eficientemente en equipos unidisciplinares y de colaborar en un entorno multidisciplinar.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  7,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de trabajar en un contexto internacional.',
                'slug'  =>  Str::slug('Capacidad de trabajar en un contexto internacional.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  7,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de relación interpersonal.',
                'slug'  =>  Str::slug('Capacidad de relación interpersonal.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  7,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad para encontrar, relacionar y estructurar información proveniente de diversas fuentes y de integrar ideas y conocimientos.',
                'slug'  =>  Str::slug('Capacidad para encontrar, relacionar y estructurar información proveniente de diversas fuentes y de integrar ideas y conocimientos.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  8,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Poseer las habilidades de aprendizaje necesarias para emprender estudios posteriores o mejorar su formación con un cierto grado de autonomía.',
                'slug'  =>  Str::slug('Poseer las habilidades de aprendizaje necesarias para emprender estudios posteriores o mejorar su formación con un cierto grado de autonomía.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  9,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de tomar decisiones basadas en criterios objetivos (datos experimentales, científicos o de simulación disponibles).',
                'slug'  =>  Str::slug('Capacidad de tomar decisiones basadas en criterios objetivos (datos experimentales, científicos o de simulación disponibles).'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  9,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de planificación y organización del trabajo personal.',
                'slug'  =>  Str::slug('Capacidad de planificación y organización del trabajo personal.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  9,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Tener motivación por el logro profesional y para afrontar nuevos retos, así como una visión amplia de las posibilidades de la carrera profesional en el ámbito de la Ingeniería en Informática.',
                'slug'  =>  Str::slug('Tener motivación por el logro profesional y para afrontar nuevos retos, así como una visión amplia de las posibilidades de la carrera profesional en el ámbito de la Ingeniería en Informática.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  10,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Tener motivación por la calidad y la mejora continua y actuar con rigor en el desarrollo profesional.',
                'slug'  =>  Str::slug('Tener motivación por la calidad y la mejora continua y actuar con rigor en el desarrollo profesional.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  10,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de adaptación a los cambios organizativos o tecnológicos.',
                'slug'  =>  Str::slug('Capacidad de adaptación a los cambios organizativos o tecnológicos.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  10,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de trabajar en situaciones de falta de información y/o con restricciones temporales y/o de recursos.',
                'slug'  =>  Str::slug('Capacidad de trabajar en situaciones de falta de información y/o con restricciones temporales y/o de recursos.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  10,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad para el razonamiento crítico, lógico y matemático.',
                'slug'  =>  Str::slug('Capacidad para el razonamiento crítico, lógico y matemático.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  11,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad para resolver problemas dentro de su área de estudio.',
                'slug'  =>  Str::slug('Capacidad para resolver problemas dentro de su área de estudio.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  11,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de abstracción: capacidad de crear y utilizar modelos que reflejen situaciones reales.',
                'slug'  =>  Str::slug('Capacidad de abstracción: capacidad de crear y utilizar modelos que reflejen situaciones reales.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  11,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de diseñar y realizar experimentos sencillos y analizar e interpretar sus resultados.',
                'slug'  =>  Str::slug('Capacidad de diseñar y realizar experimentos sencillos y analizar e interpretar sus resultados.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  11,
                'order' =>  null,
                'description'   => null
            ],
            [
                'name'  =>  'Capacidad de análisis, síntesis y evaluación.',
                'slug'  =>  Str::slug('Capacidad de análisis, síntesis y evaluación.'),
                'icon'  =>  null,
                'value' =>  1,
                'parent_id' =>  11,
                'order' =>  null,
                'description'   => null
            ],

        ];

        foreach($competencies as $competency)
        {
            Competency::create([
                'name'  => $competency['name'],
                'slug'  => $competency['slug'],
                'icon'  => $competency['icon'],
                'value' => $competency['value'],
                'parent_id' => $competency['parent_id'],
                'order' => $competency['order'],
                'description'   => $competency['description']
            ]);
        }
    }
}

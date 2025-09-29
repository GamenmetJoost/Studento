<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Seeder;

class KennisquizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding Categories...');
        $this->seedCategories();
        
        $this->command->info('Seeding Questions...');
        $this->seedQuestions();
        
        $this->command->info('Seeding Choices...');
        $this->seedChoices();
        
        $this->command->info('Kennisquiz data seeded successfully!');
    }

    private function seedCategories()
    {
        $categories = [
            ['id' => 1, 'name' => 'Sociaal werk', 'subcategory' => 'Doelgroepen', 'folder_guid' => '3102d8f5-f1f1-4ee8-a668-e1befdf575ce'],
            ['id' => 2, 'name' => 'Sociaal werk', 'subcategory' => 'Sociale Kaart', 'folder_guid' => 'f3aa1f3e-ecf1-4ecf-a1cf-0e21cef15b25'],
            ['id' => 3, 'name' => 'Sociaal werk', 'subcategory' => 'Signalen herkennen', 'folder_guid' => '76313c62-779c-460b-987f-bd86edabcd5a'],
            ['id' => 4, 'name' => 'Sociaal werk', 'subcategory' => 'Bezwaarschrift', 'folder_guid' => '4888c01f-c053-42b6-b806-3992c99d6b15'],
            ['id' => 5, 'name' => 'Sociaal werk', 'subcategory' => 'Financiën en budget', 'folder_guid' => '9f17d796-5c85-4f29-8769-71da8e0ec836'],
            ['id' => 6, 'name' => 'Sociaal werk', 'subcategory' => 'Social Media', 'folder_guid' => 'bd88a62c-8d4c-4647-b04c-d1422eff0a7e'],
            ['id' => 7, 'name' => 'Sociaal werk', 'subcategory' => 'Gezondheid en welbevinden', 'folder_guid' => '4674293f-41cc-41e9-91f2-bd811c55eda5'],
            ['id' => 8, 'name' => 'Sociaal werk', 'subcategory' => 'Gesprekstechnieken', 'folder_guid' => '087b9445-7a57-4016-b5cd-9df678a0f875'],
            ['id' => 9, 'name' => 'Sociaal werk', 'subcategory' => 'Werkveld', 'folder_guid' => 'd2ef8e4a-be8c-4589-ba88-1686c99a9194'],
            ['id' => 10, 'name' => 'Sociaal werk', 'subcategory' => 'Beroepsethiek', 'folder_guid' => '9eae44b6-762c-4014-ab86-f622eaa03305'],
            ['id' => 11, 'name' => 'Sociaal werk', 'subcategory' => 'Reflectie', 'folder_guid' => '1779db32-db86-499e-b4a0-b612ae7bb5b8'],
            ['id' => 12, 'name' => 'Sociaal werk', 'subcategory' => 'Stappen meldcode', 'folder_guid' => '152b7d06-7bba-44b3-8168-2936bd53e933'],
            ['id' => 13, 'name' => 'Sociaal werk', 'subcategory' => 'Wijkgericht werken', 'folder_guid' => '0f74359d-73bc-42fd-8450-51e80ee5eae1']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }

    private function seedQuestions()
    {
        $questions = [
            ['id' => 1, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_972cb5fb4a', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Mensen met een alcoholverslaving vormen veruit de grootste groep in de verslavingszorg.", 'category_id' => 1],
            ['id' => 2, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e263f083b5', 'question_text' => "Binnen welke leeftijdsgrens valt de volwassen fase?", 'category_id' => 1],
            ['id' => 3, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e4e595190b', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Iemand met een verstandelijke beperking heeft een IQ van maximaal 80.", 'category_id' => 1],
            ['id' => 4, 'identifier' => 'choiceInteraction_LARGESOURCE_MANYCHOICE_f9bd9d930b', 'question_text' => "Wat is geen signaal van een gokverslaving? Er zijn twee antwoorden goed.", 'category_id' => 1],
            ['id' => 5, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3397575086', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Grove motoriek heeft betrekking op kleine bewegingen zoals tekenen en schrijven.", 'category_id' => 1],
            ['id' => 6, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_101152103b', 'question_text' => "Wat is een signaal bij gameverslaving?", 'category_id' => 1],
            ['id' => 7, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5cff923406', 'question_text' => "Wanneer spreken we van een gedetineerde?", 'category_id' => 1],
            ['id' => 8, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_68b70e9539', 'question_text' => "Wat wordt bedoeld met de term Mensen met een afstand tot de arbeidsmarkt?", 'category_id' => 1],
            ['id' => 9, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3286a6c780', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Iemand die internaliserend probleemgedrag vertoont, is vaak druk en beweeglijk.", 'category_id' => 1],
            ['id' => 10, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f133a75718', 'question_text' => "Omdat er grote verschillen zijn tussen mensen met een verstandelijke beperking, wordt er onderscheid gemaakt in de mate van de verstandelijke beperking. Welk onderscheid wordt er gemaakt?", 'category_id' => 1],
            ['id' => 11, 'identifier' => 'choiceInteraction_LARGESOURCE_MANYCHOICE_6d1b16a603', 'question_text' => "Wanneer is er sprake van dakloos zijn? Geef de twee juiste antwoorden.", 'category_id' => 1],
            ['id' => 12, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8554d3cedc', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Als iemand gedwongen wordt om te werken onder onmenselijke omstandigheden, om seks te hebben, te bedelen of te stelen is er sprake van mensenhandel.", 'category_id' => 1],
            ['id' => 13, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_02fb02fcf6', 'question_text' => "Wat is geen levensfase?", 'category_id' => 1],
            ['id' => 14, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a40ae5c0a7', 'question_text' => "Wat is de juiste benaming voor mensen die moeite hebben met taalvaardigheden, zoals lezen en/of schrijven?", 'category_id' => 1],
            ['id' => 15, 'identifier' => 'choiceInteraction_LARGESOURCE_MANYCHOICE_69b16274af', 'question_text' => "Kinderen van 6 tot 12 jaar noemen we schoolkinderen. Deze periode kenmerkt zich doordat kinderen steeds meer gericht zijn op een aantal aspecten. Welke drie aspecten zijn dat?", 'category_id' => 1],
            ['id' => 16, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_31462b3a69', 'question_text' => "Wat is de maximale leeftijdsgrens voor de uitvoering van het jeugdstrafrecht?", 'category_id' => 1],
            ['id' => 17, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_1c7076d4c0', 'question_text' => "Wat is geen ontwikkelingsaspect binnen de ontwikkelingspsychologie?", 'category_id' => 1],
            ['id' => 18, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_89a9a65c51', 'question_text' => "Wat is de betekenis van de term asielzoeker?", 'category_id' => 1],
            ['id' => 19, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_de172b32d9', 'question_text' => "Wat is geen kenmerk van een probleemgezin?", 'category_id' => 1],
            ['id' => 20, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e36e60e1d6', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Met de woorden vluchtelingen, asielzoekers en migranten wordt hetzelfde bedoeld.", 'category_id' => 1],
            ['id' => 21, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8b5d93765f', 'question_text' => "Wanneer spreken we van gedragsproblemen bij kinderen?", 'category_id' => 1],
            ['id' => 22, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_637760afcf', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  We spreken van huiselijk geweld wanneer door partner, ex-partner, vriend of vriendin, geweld gepleegd wordt. Dit kan lichamelijk, seksueel en emotioneel geweld zijn.", 'category_id' => 1],
            ['id' => 23, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f8e1f52679', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De termen dakloos en thuisloos betekenen hetzelfde.", 'category_id' => 1],
            ['id' => 24, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f9429b8081', 'question_text' => "Onder welke rubriek van de Sociale Kaart kan je informatie vinden over de WMO?", 'category_id' => 2],
            ['id' => 25, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e7988d0957', 'question_text' => "Is de volgende stelling waar of niet waar?In een Sociale Kaart vinden burgers en hulpverleners informatie over organisaties en hun aanbod op het gebied van wonen, welzijn en zorg in de omgeving.", 'category_id' => 2],
            ['id' => 26, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f37bad79ca', 'question_text' => "Is de volgende stelling waar of niet waar?Een Sociale Kaart hoeft niet bijgewerkt te worden.", 'category_id' => 2],
            ['id' => 27, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_71f8181e02', 'question_text' => "Is de volgende stelling waar of niet waar?Een Sociale Kaart kan niet enkel ingericht worden voor een specifieke doelgroep.", 'category_id' => 2],
            ['id' => 28, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d8298547ca', 'question_text' => "Wat is een onderwerp van de Sociale Kaart voor daklozen?", 'category_id' => 2],
            ['id' => 29, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_19489ef5d0', 'question_text' => "Is de volgende stelling waar of niet waar?Iedere gemeente is verplicht om een Sociale Kaart op de website van de gemeente te zetten.", 'category_id' => 2],
            ['id' => 30, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_1257900026', 'question_text' => "Wat is geen onderwerp op de Sociale Kaart?", 'category_id' => 2],
            ['id' => 31, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_b4405112a2', 'question_text' => "Wat is geen kenmerk van een Sociale Kaart?", 'category_id' => 2],
            ['id' => 32, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_308c4fe10a', 'question_text' => "Is de volgende stelling waar of niet waar?De Sociale Kaart is alleen toegankelijk voor mensen die werkzaam zijn binnen het sociaal domein.", 'category_id' => 2],
            ['id' => 33, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5685ad95a5', 'question_text' => "Welke gegevens van een organisatie zijn terug te vinden op een Sociale Kaart?", 'category_id' => 2],
            ['id' => 34, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_cd5ed0ce10', 'question_text' => "Wat is geen mogelijk signaal bij seksueel misbruik bij kinderen?", 'category_id' => 3],
            ['id' => 35, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_c903b6d876', 'question_text' => "In het buurthuis waar je werkt is een van de kinderen vaak angstig, vermijdt oogcontact en is teruggetrokken. Daarnaast valt het je op dat ze altijd kleding met lange mouwen aan heeft, ook nu het warm weer is. Hier is duidelijk sprake van mishandeling.", 'category_id' => 3],
            ['id' => 36, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_936735a2e7', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Met seksuele dysfuncties wordt bedoeld dat er stoornissen zijn in het seksueel functioneren.", 'category_id' => 3],
            ['id' => 37, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_437d9cf151', 'question_text' => "Wat wordt bedoeld met co-verslaving?", 'category_id' => 3],
            ['id' => 38, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_eead5dc073', 'question_text' => "Wat is geen gevolg van een eetstoornis?", 'category_id' => 3],
            ['id' => 39, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_152ae1a59a', 'question_text' => "Wat is Orthorexia nervosa?", 'category_id' => 3],
            ['id' => 40, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_ee4a88d06e', 'question_text' => "Wat is geen mogelijke oorzaak van een taalachterstand bij kinderen?", 'category_id' => 3],
            ['id' => 41, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_14f7979d51', 'question_text' => "Bij pesten is er sprake van verschillende rollen. Welke rollen zijn dat?", 'category_id' => 3],
            ['id' => 42, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5cf1f889d7', 'question_text' => "Wat is een oorzaak voor beginnende criminaliteit?", 'category_id' => 3],
            ['id' => 43, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_87eaee2d14', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De omgeving waarin je bent opgegroeid, is geen mogelijke oorzaak van beginnende criminaliteit.", 'category_id' => 3],
            ['id' => 44, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_2e3bf7a6fc', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een taalontwikkelingsstoornis is hetzelfde als een taalachterstand.", 'category_id' => 3],
            ['id' => 45, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_34ac8792c3', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Iemand die pest, doet dat vaak om zijn eigen onzekerheid te verbergen.", 'category_id' => 3],
            ['id' => 46, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_ee7c74af51', 'question_text' => "Wat is geen oorzaak van obesitas?", 'category_id' => 3],
            ['id' => 47, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d1b90ea1d5', 'question_text' => "Hoeveel mensen in Nederland leven in armoede", 'category_id' => 3],
            ['id' => 48, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_4e12ee735e', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Bij stille armoede is het vaak niet zichtbaar dat mensen hun huur niet meer kunnen betalen of kinderen zonder ontbijt naar school sturen.", 'category_id' => 3],
            ['id' => 49, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_2c9f4dd99f', 'question_text' => "Wat is geen signaal bij laaggeletterdheid?", 'category_id' => 3],
            ['id' => 50, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_68cfcf1a21', 'question_text' => "Welke factor heeft geen invloed op verslaving?", 'category_id' => 3],
            ['id' => 51, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_33621bf851', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een persoon die aan Anorexia lijdt, heeft last van eetbuien en de behoefte om controle te houden over zijn lichaamsgewicht.", 'category_id' => 3],
            ['id' => 52, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_40aecfe0b0', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Eenzaamheid is een sociale problematiek.", 'category_id' => 3],
            ['id' => 53, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_358ed86be3', 'question_text' => "De zaak van je cliënt is op basis van de stukken behandeld (dus zonder zitting) omdat de rechter meent dat de zaak heel eenvoudig is. Je cliënt is het echter niet eens met de beslissing van de rechter. Welke vervolgstap kan je cliënt zetten?", 'category_id' => 4],
            ['id' => 54, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d3c72837c0', 'question_text' => "Je cliënt heeft een bezwaarschrift ingediend tegen het besluit van het stopzetten van zijn uitkering. De cliënt heeft tijdens de bezwaarprocedure via de rechter een aanvraag van een voorlopige voorziening gedaan. De rechter heeft deze voorlopige voorziening toegewezen. Het eindresultaat is dat het bezwaar wordt afgewezen en het UWV in zijn recht staat. Moet de cliënt de voorlopige voorziening, die is toegewezen door de rechter, terugbetalen?", 'category_id' => 4],
            ['id' => 55, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_023111e347', 'question_text' => "Wat is de gemiddelde tijd waarbinnen je een bezwaarschrift moet indienen bij een overheidsinstantie?", 'category_id' => 4],
            ['id' => 56, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_183e0e02fa', 'question_text' => "Welke mogelijkheid heeft iemand als zijn uitkering is stopgezet en hij verder geen ander inkomen heeft?", 'category_id' => 4],
            ['id' => 57, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_9e2fb5245b', 'question_text' => "Het UWV heeft de uitkering van een van je cliënten stopgezet. De cliënt is het hier niet mee eens en verstuurt een bezwaarschrift. Heeft de cliënt tijdens de bezwaarprocedure recht op een uitkering?", 'category_id' => 4],
            ['id' => 58, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_cae7d213b0', 'question_text' => "Is de volgende stelling waar of niet waar?Een cliënt is het niet eens met het besluit van het UWV en heeft, met jouw hulp, een bezwaar ingediend. Doordat er sprake is van een lichamelijke beperking bij je cliënt kan het langer duren, tot wel 17 weken, voordat er een uitspraak komt.", 'category_id' => 4],
            ['id' => 59, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_1feab2b541', 'question_text' => "Is de volgende stelling waar of niet waar? Wanneer het bezwaarschrift bij een overheidsinstantie te laat is ingediend, dan is de betreffende overheidsinstantie toch verplicht dit in behandeling te nemen.", 'category_id' => 4],
            ['id' => 60, 'identifier' => 'orderInteraction_ARANGE_TEXT_e879f801ee', 'question_text' => "Wanneer je een bezwaar hebt ingediend tegen een besluit van de overheid, treedt er een proces in werking. Zet de stappen van dit proces in de juiste volgorde.", 'category_id' => 4],
            ['id' => 61, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_0d0d84e5c3', 'question_text' => "Wat is het griffierecht?", 'category_id' => 4],
            ['id' => 62, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5ea961837d', 'question_text' => "Wat vermeld je niet en/of voeg je niet toe aan een bezwaarschrift?", 'category_id' => 4],
            ['id' => 63, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_4cefb23c73', 'question_text' => "Wat moet je indienen als je in hoger beroep wilt gaan?", 'category_id' => 4],
            ['id' => 64, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_166dfd677d', 'question_text' => "Wat is geen voorwaarde om in aanmerking te komen voor de bijzonder bijstand?", 'category_id' => 5],
            ['id' => 65, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_7e850ee9b0', 'question_text' => "Wat is de uiterlijke termijn voor het aanvragen van een IOAW-uitkering (inkomensvoorziening voor ouderen en arbeidsongeschikte werknemers)?", 'category_id' => 5],
            ['id' => 66, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d4419d655a', 'question_text' => "Waar moet een aanvraag voor een Wmo-voorziening ingediend worden?", 'category_id' => 5],
            ['id' => 67, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_16d4c39704', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Iemand die een verlenging van zijn arbeidscontract weigert, heeft geen recht op een ww-uitkering.", 'category_id' => 5],
            ['id' => 68, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a9413b7877', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Hulp bij thuisadministratie is met name gericht op het op orde brengen (en houden) van de administratie rondom geldzaken bij mensen die hierin het overzicht zijn kwijtgeraakt.", 'category_id' => 5],
            ['id' => 69, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d20825893b', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een individuele inkomenstoeslag is bedoeld voor mensen die, door onvoorziene omstandigheden en voor een korte periode, een lager inkomen hebben.", 'category_id' => 5],
            ['id' => 70, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_c1e319d64f', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De heer Petrovic is 22 jaar en heeft de Poolse nationaliteit. Hij woont voor een langere periode in Nederland. Zijn inkomen is niet voldoende om in zijn eigen levensonderhoud te voorzien. Dit betekent dat hij recht heeft op de algemene bijstand.", 'category_id' => 5],
            ['id' => 71, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e0b9578d3d', 'question_text' => "Wie van de volgende personen heeft geen recht op een individuele inkomenstoeslag?", 'category_id' => 5],
            ['id' => 72, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f74de59799', 'question_text' => "Voor wie is de studietoeslag bedoeld?", 'category_id' => 5],
            ['id' => 73, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_406bf4c73f', 'question_text' => "Wat is de bijzondere bijstand?", 'category_id' => 5],
            ['id' => 74, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_50d8e93b2a', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Budgetbeheer (ook wel inkomensbeheer) is enkel bedoeld om schulden te voorkomen.", 'category_id' => 5],
            ['id' => 75, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d09ad67d53', 'question_text' => "Wat betekenen de letters AVG?", 'category_id' => 6],
            ['id' => 76, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8662be7ea3', 'question_text' => "Wat is DigiD?", 'category_id' => 6],
            ['id' => 77, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_70e9d684c5', 'question_text' => "Wat is een algoritme?", 'category_id' => 6],
            ['id' => 78, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d309710d96', 'question_text' => "Wat is een vorm van deepfake?", 'category_id' => 6],
            ['id' => 79, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d5624ca59d', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Algoritmes kunnen bevooroordeeld zijn.", 'category_id' => 6],
            ['id' => 80, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_cd78f32950', 'question_text' => "De Raad van Cultuur omschreef in 2005 het volgende: Het geheel van kennis, vaardigheden en mentaliteit, waarmee burgers zich bewust, kritisch en actief kunnen bewegen in een complexe, veranderlijke en fundamenteel gemedialiseerde wereld. Welke term hebben ze hier omschreven?", 'category_id' => 6],
            ['id' => 81, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3180bd378e', 'question_text' => "Er wordt een waarschuwing per e-mail, of op sociale netwerken, verspreid. De informatie is niet waar, maar wordt als waarheid gepresenteerd. Er wordt gevraagd het bericht met zo veel mogelijk mensen te delen. Waar is hier sprake van?", 'category_id' => 6],
            ['id' => 82, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_9a4873a54e', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Met digitale geletterdheid en digitale vaardigheden wordt hetzelfde bedoeld.", 'category_id' => 6],
            ['id' => 83, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_9acab0dd41', 'question_text' => "Is de volgende stelling waar of niet waar?Binnen de gehele Europese Unie geldt dezelfde privacy wetgeving.", 'category_id' => 6],
            ['id' => 84, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_50945dfa11', 'question_text' => "Tijdens een huisbezoek heb je het vermoeden dat de cliënt een beroerte heeft. Hij vertoont de volgende symptomen:een scheve mond door (halfzijdige) verlamming in zijn gezichtwarrig spreken en denkenverlamming in zijn armplotselinge ongewone hoofdpijnerg misselijkWat moet je direct doen?", 'category_id' => 7],
            ['id' => 85, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8563cdf57f', 'question_text' => "Welbevinden is een steeds vaker genoemd thema binnen het welzijnswerk. Welk kenmerk is geen kenmerk van welbevinden?", 'category_id' => 7],
            ['id' => 86, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_38f960f309', 'question_text' => "Wat valt niet onder het autisme spectrum stoornis?", 'category_id' => 7],
            ['id' => 87, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_4d94eee4a8', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een collega geeft het volgende advies aan een gezin waar een van de kinderen autisme heeft.Het is goed om de omgeving van uw kind aan te passen. Hierbij kunt u denken aan een vast dagritme, een eigen plek aan tafel, het gebruik maken van pictogrammen. Dit advies is passend bij de behandeling van iemand met autisme.", 'category_id' => 7],
            ['id' => 88, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e24cabea43', 'question_text' => "Een van je cliënten heeft last van sterke wisselingen in haar stemming, gedachten en gedrag. Dit zorgt ervoor dat ze vastloopt in haar dagelijks leven. Van welke stoornis is hier sprake?", 'category_id' => 7],
            ['id' => 89, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_ebbe60f052', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Dementie is de naam voor een combinatie van symptomen waarbij de hersenen informatie niet meer kunnen verwerken.", 'category_id' => 7],
            ['id' => 90, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8a4a276673', 'question_text' => "Wat is geen symptoom van Schizofrenie?", 'category_id' => 7],
            ['id' => 91, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_dc1d54519a', 'question_text' => "Bij een huisbezoek geeft je cliënt aan dat hij al langere tijd last heeft van zijn gewrichten. De pijn zit vooral in zijn schouders en nek, maar ook zijn heupen doen regelmatig pijn. Jij denkt dat het een vorm van reuma is. Wat is je advies?", 'category_id' => 7],
            ['id' => 92, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_46fd0b08dd', 'question_text' => "Wat is geen kinderziekte?", 'category_id' => 7],
            ['id' => 93, 'identifier' => 'choiceInteraction_LARGESOURCE_MANYCHOICE_c1978455a1', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Voor de meeste kinderziektes is het verstandig om direct naar de huisarts of spoedeisende hulp te gaan.", 'category_id' => 7],
            ['id' => 94, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f50537790e', 'question_text' => "Wat is geen symptoom van Alzheimer?", 'category_id' => 7],
            ['id' => 95, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8b547151c8', 'question_text' => "Waar staan de letters PTSS voor?", 'category_id' => 7],
            ['id' => 96, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d5b6990ec4', 'question_text' => "Wat is een andere benaming voor CVA (cerebrovasculair)?", 'category_id' => 7],
            ['id' => 97, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a9d916593e', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Suikerziekte is hetzelfde als diabetes.", 'category_id' => 7],
            ['id' => 98, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_853af067a5', 'question_text' => "Je cliënt geeft aan dat ze de laatste tijd bang is om het huis uit te gaan. Ze durft onder andere niet meer naar de supermarkt en het winkelcentrum. Ze komt nog wel eens buiten, maar dan vooral op momenten dat het niet zo druk is en veel verder dan haar eigen straat durft ze niet.Bij deze cliënt is er sprake van een ...", 'category_id' => 7],
            ['id' => 99, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_55f022f193', 'question_text' => "Wat is geen symptoom van COPD?", 'category_id' => 7],
            ['id' => 100, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_27ed834430', 'question_text' => "Waar staan de letters LSD voor?", 'category_id' => 8],
            ['id' => 101, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_447f62d93e', 'question_text' => "Is de volgende stelling waar of niet waar?Een conflicthanteringsgesprek is een onderhandeling waarbij je twee ruziënde partijen weer bij elkaar probeert te brengen.", 'category_id' => 8],
            ['id' => 102, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a09a08f435', 'question_text' => "Wat is een communicatiemiddel?", 'category_id' => 8],
            ['id' => 103, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_4a1099012f', 'question_text' => "Is de volgende stelling waar of niet waar?Het keukentafelgesprek is letterlijk een gesprek dat je voert aan de keukentafel, bij de cliënt thuis, en heeft een informeel karakter.", 'category_id' => 8],
            ['id' => 104, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d61f8b8b17', 'question_text' => "Waar staan de letters ANNA voor?", 'category_id' => 8],
            ['id' => 105, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e2b8308ed9', 'question_text' => "Wat wordt bedoeld met smeer NIVEA?", 'category_id' => 8],
            ['id' => 106, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_0065f45cae', 'question_text' => "Wat is geen gespreksonderwerp tijdens een keukentafelgesprek?", 'category_id' => 8],
            ['id' => 107, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a0782a74fc', 'question_text' => "Wat is een valkuil bij het voeren van gesprekken?", 'category_id' => 8],
            ['id' => 108, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_fb79e43ede', 'question_text' => "Is de volgende stelling waar of niet waar?Aandachtig luisteren betekent dat je je mond houdt en je oren spitst en pas wat zegt als de ander uitgesproken is.", 'category_id' => 8],
            ['id' => 109, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d1b0396218', 'question_text' => "Wat is geen gesprekstechniek?", 'category_id' => 8],
            ['id' => 110, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5c97a4d03f', 'question_text' => "Is de volgende stelling waar of niet waar?Organisaties, die hulp en opvang bieden aan mensen die slachtoffer zijn van huiselijk geweld en mishandeling, zijn alleen bedoeld voor vrouwen.", 'category_id' => 9],
            ['id' => 111, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e47ec7c1ce', 'question_text' => "Waar staan de letters SRW voor?", 'category_id' => 9],
            ['id' => 112, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_43e8ceec65', 'question_text' => "Voor welk probleem kan je een beroep doen op een maatschappelijk werker?", 'category_id' => 9],
            ['id' => 113, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_6e7fe6dd56', 'question_text' => "Wat is een kenmerk van de maatschappelijke opvang voor dak- en thuislozen?", 'category_id' => 9],
            ['id' => 114, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f017e3f0f9', 'question_text' => "Is de volgende stelling waar of niet waar?Jongerenwerk is gericht op jongeren in de leeftijd van 12 tot 23.", 'category_id' => 9],
            ['id' => 115, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_30d57f6755', 'question_text' => "Met welke vragen kan je niet terecht bij sociale raadslieden?", 'category_id' => 9],
            ['id' => 116, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_be903993af', 'question_text' => "Welke vorm van hulp valt niet onder de schuldhulpverlening van de gemeente?", 'category_id' => 9],
            ['id' => 117, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_242168690c', 'question_text' => "Welke hulp kan niet bij de vrouwenopvang ingeschakeld worden?", 'category_id' => 9],
            ['id' => 118, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_62b1c14e7b', 'question_text' => "Is de volgende stelling waar of niet waar?Schuldeisers zijn verplicht om mee te werken aan betaalvoorstellen.", 'category_id' => 9],
            ['id' => 119, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_7e6b541f26', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een ethisch dilemma bevat altijd verschillende waarden.", 'category_id' => 10],
            ['id' => 120, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3923149f40', 'question_text' => "Waar heeft de volgende zin betrekking op?Het geheel van waarden en normen, waaraan de beroepsbeoefenaar zich bij de uitoefening van zijn beroep dient te houden.", 'category_id' => 10],
            ['id' => 121, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a9d08359f8', 'question_text' => "Wat is geen kenmerk van een ethisch dilemma?", 'category_id' => 10],
            ['id' => 122, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_464fe99b1f', 'question_text' => "Wat is geen fase binnen het stappenplan voor ethische dilemma's?", 'category_id' => 10],
            ['id' => 123, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_2384c34e69', 'question_text' => "Is de volgende stelling waar of niet waar?Met beroepscode en beroepsethiek wordt hetzelfde bedoeld.", 'category_id' => 10],
            ['id' => 124, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_a7912ec71d', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De ethische commissie is voor iedere sociaal werker benaderbaar, ongeacht of hij wel/niet in het beroepsregister staat geregistreerd.", 'category_id' => 10],
            ['id' => 125, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_2617f99f76', 'question_text' => "Als sociaal werker kom je bij een gezin met schulden. Je helpt het gezin al een tijd met het op orde brengen van de administratie en het in kaart brengen van de inkomsten en uitgaven. Inmiddels heb je al een aardige vertrouwensband met het gezin opgebouwd. Tijdens je laatste bezoek kom je er achter dat het gezin fraudeert met uitkeringen. Je vraagt je af of je dit wel of niet moet melden. Het melden kan immers ten koste gaan van de vertrouwensband, maar frauderen is strafbaar. Waar is hier sprake van?", 'category_id' => 10],
            ['id' => 126, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_ef3df97df2', 'question_text' => "Wat wordt binnen de beroepsethiek bedoeld met formele waarden?", 'category_id' => 10],
            ['id' => 127, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_417f410d52', 'question_text' => "In het sociaal werk kan je te maken krijgen met ethische vraagstukken waarbij je jezelf afvraagt welke handelingen goed of fout zijn. Er zijn verschillende documenten opgesteld die antwoord geven op dergelijke vraagstukken. Wat is hier geen voorbeeld van?", 'category_id' => 10],
            ['id' => 128, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_0c6b16daaf', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De beroepsethiek is een verzameling van geschreven en ongeschreven normen en waarden voor het professioneel uitvoeren van het beroep.", 'category_id' => 10],
            ['id' => 129, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3c3ad2eef9', 'question_text' => "Is de volgende stelling waar of niet waar? Reflecteren doe je alleen op jezelf en niet op anderen.", 'category_id' => 11],
            ['id' => 130, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_b606907efc', 'question_text' => "Waar staan de letters STARRT voor in de STARRT-methode?", 'category_id' => 11],
            ['id' => 131, 'identifier' => 'orderInteraction_ARANGE_TEXT_f980769b3f', 'question_text' => "Zet de vijf stappen van het reflectiemodel van Korthagen in de juiste volgorde.", 'category_id' => 11],
            ['id' => 132, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_561cc8b650', 'question_text' => "Het reflectie model van Korthagen bestaat uit vijf stappen. Welke stap is bewustwording?", 'category_id' => 11],
            ['id' => 133, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3a7bc317bc', 'question_text' => "Je hebt mevrouw De Vries vandaag ondersteund bij de aanvraag voor haar zorgtoeslag. De aanvraag is wel gelukt, maar mevrouw De Vries is niet helemaal tevreden naar huis gegaan. Je kijkt terug op de situatie en stelt jezelf vragen over jouw manier van handelen. Hoe was jouw gevoel en waarom maakte je bepaalde keuzes? Hoe heet deze vorm van terugkijken op de situatie?", 'category_id' => 11],
            ['id' => 134, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_4eceb770db', 'question_text' => "Is de volgende stelling waar of niet waar? Reflecteren is hetzelfde als evalueren.", 'category_id' => 11],
            ['id' => 135, 'identifier' => 'orderInteraction_ARANGE_TEXT_10203ba6a6', 'question_text' => "Zet de stappen van het reflectiemodel van Gibbs in de juiste volgorde.", 'category_id' => 11],
            ['id' => 136, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f5c3169e31', 'question_text' => "Het ABCD-reflectiemodel staat voor Aanleiding, Belangrijk, Conclusie, Doen. Vaak wordt dit model nog uitgebreid met de letters E en F. Welke vragen horen bij deze letters?", 'category_id' => 11],
            ['id' => 137, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_dedf25c617', 'question_text' => "Wat is geen reflectiemodel?", 'category_id' => 11],
            ['id' => 138, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8d0eaa2fde', 'question_text' => "Is de volgende stelling waar of niet waar? De STARR methode is geen doel op zich maar een hulpmiddel om te reflecteren.", 'category_id' => 11],
            ['id' => 139, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_93f3f19170', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Het hanteren van het afwegingskader is verplicht in de stappen 4 en 5 van de meldcode.", 'category_id' => 12],
            ['id' => 140, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_09f79f9efb', 'question_text' => "In de wet meldcode staat dat de professionals het recht hebben melding te maken bij Veilig Thuis. Wat betekent dit meldrecht?", 'category_id' => 12],
            ['id' => 141, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8499680c86', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Je kan de meldcode na elke stap afsluiten, mits dit wordt vastgelegd in het dossier.", 'category_id' => 12],
            ['id' => 142, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_7ae58458c3', 'question_text' => "Preventie kan je op vier niveaus inzetten. Welke hoort niet bij deze vier niveaus?", 'category_id' => 12],
            ['id' => 143, 'identifier' => 'orderInteraction_ARANGE_TEXT_759be73bae', 'question_text' => "Zet het stappenplan van de meldcode in de juiste volgorde.", 'category_id' => 12],
            ['id' => 144, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_25c44516e9', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Als een persoon contact opneemt met een expert van Veilig Thuis, dan is er sprake van een officiële melding en moet er een onderzoek gestart worden.", 'category_id' => 12],
            ['id' => 145, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_1d1d7d8e97', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  De meldcode heeft met nadruk een meldplicht.", 'category_id' => 12],
            ['id' => 146, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e4114a8b64', 'question_text' => "Welke wijziging is er sinds 1 januari 2019 in het besluit verplichte meldcode in werking gesteld?", 'category_id' => 12],
            ['id' => 147, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_0ee2b231ba', 'question_text' => "Is de volgende stelling waar of niet waar?\n  Het doel van de meldcode is professionals te helpen eerder en beter te handelen als zij vermoeden dat een gezinslid thuis mishandeld, verwaarloosd of seksueel misbruikt wordt.", 'category_id' => 12],
            ['id' => 148, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_23c82b7f73', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Als sociaal werker ben je verplicht elk vermoeden van kindermishandeling te melden.", 'category_id' => 12],
            ['id' => 149, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_94f730a16e', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Het organiseren van sport- en bewegingsactiviteiten in de wijk, draagt bij aan de sociale cohesie in de wijk.", 'category_id' => 13],
            ['id' => 150, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_6e73957f48', 'question_text' => "Binnen het wijkteam werk je met verschillende partners samen. Je werkt niet alleen samen met professionals in de eerste en tweede lijn, maar ook met mantelzorgers, vrijwilligers, ervaringsdeskundigen en bewonersnetwerken. Onder welke netwerk vallen de professionals in de eerste en tweede lijn?", 'category_id' => 13],
            ['id' => 151, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_d7b8d1fc32', 'question_text' => "Mevrouw De Vries werkt in het onderwijs, dit doet ze inmiddels alweer 20 jaar en nog steeds met veel plezier. Ze merkt wel dat de werkdruk de laatste jaren is toegenomen en dat de school waar ze werkt weinig doet om de werkdruk te verlagen. Mevrouw De Vries besluit mede hierom zich aan te sluiten bij een vakbond. Wat voor soort organisatie is een vakbond?", 'category_id' => 13],
            ['id' => 152, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_357984e0e0', 'question_text' => "Is de volgende stelling waar of niet waar?\n  \n  Een wijkanalyse is altijd gericht op alle aspecten in een wijk en kan niet ingezet worden voor één of enkele aspecten van een wijk.", 'category_id' => 13],
            ['id' => 153, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_90a9155c30', 'question_text' => "Wie valt niet onder het informele netwerk in de wijk?", 'category_id' => 13],
            ['id' => 154, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_5c9a157121', 'question_text' => "Wat is geen belangenorganisatie?", 'category_id' => 13],
            ['id' => 155, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_fa74d1226f', 'question_text' => "Waar heeft de volgende zin betrekking op? Zorgen dat inwoners van wijken (of buurt) prettig samenleven, zich verbonden voelen en ook naar inwoners omkijken in een kwetsbare positie.", 'category_id' => 13],
            ['id' => 156, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_008e83b4b6', 'question_text' => "In Amsterdam is door de vrijwilligersacademie de BurenBond opgericht. De BurenBond wil 'buren' gaan organiseren voor mensen met een beperking, die moeite hebben het dagelijks leven vorm te geven. Zij willen gaan werken met teams van vrijwilligers die wijkbreed ingezet kunnen worden, in nauwe samenwerking met huisartsen. Deze teams worden begeleid door coaches die werken vanuit de principes van zelfsturing. Hoe wordt deze vorm genoemd?", 'category_id' => 13],
            ['id' => 157, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_8aaef32a81', 'question_text' => "De gemeente Utrecht heeft als doel om het aankomende jaar te gaan investeren in diverse wijken. Voordat deze investering plaats gaat vinden, moet het helder zijn welke verbeterpunten en speerpunten er zijn voor de wijk(en). Aan jou, als sociaal werker, is gevraagd om voor jouw wijk de verbeterpunten en speerpunten in kaart te brengen. Welk instrument is hier geschikt voor?", 'category_id' => 13],
            ['id' => 158, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_9055599efd', 'question_text' => "Wat wordt bedoeld met een zelfhulpgroep?", 'category_id' => 13]
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }

    private function seedChoices()
    {
        $choices = [
            // Question 1
            ['question_id' => 1, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 1, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 2
            ['question_id' => 2, 'identifier' => 'A1', 'choice_text' => 'De leeftijdsgrens van 21 - 67 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 2, 'identifier' => 'A2', 'choice_text' => 'Er is geen duidelijke leeftijdsgrens.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 2, 'identifier' => 'A3', 'choice_text' => 'De leeftijdsgrens van 20 - 70 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 3
            ['question_id' => 3, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 3, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 4
            ['question_id' => 4, 'identifier' => 'A1', 'choice_text' => 'Wegblijven van school of werk.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 4, 'identifier' => 'A2', 'choice_text' => 'Ander voorliegen dat je geld hebt gewonnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 4, 'identifier' => 'A3', 'choice_text' => 'Geld lenen en dit weer terug betalen.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 4, 'identifier' => 'A4', 'choice_text' => 'Blijven gokken om je verloren geld terug te winnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 4, 'identifier' => 'A5', 'choice_text' => 'Wel willen stoppen met gokken, maar het niet kunnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 5
            ['question_id' => 5, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 5, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 6
            ['question_id' => 6, 'identifier' => 'A1', 'choice_text' => 'Niet behalen van een diploma (school)', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 6, 'identifier' => 'A2', 'choice_text' => 'Verliezen van je baan', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 6, 'identifier' => 'A3', 'choice_text' => 'Relaties die stuklopen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 6, 'identifier' => 'A4', 'choice_text' => 'Alle antwoorden zijn goed.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 7
            ['question_id' => 7, 'identifier' => 'A1', 'choice_text' => 'Als iemand, op basis van het strafrecht, opgenomen is in een huis van bewaring, gevangenis of psychiatrische instelling.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 7, 'identifier' => 'A2', 'choice_text' => 'Als iemand opgenomen is in een psychiatrische instelling.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 7, 'identifier' => 'A3', 'choice_text' => 'Als iemand geplaatst is in een gesloten setting.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 8
            ['question_id' => 8, 'identifier' => 'A1', 'choice_text' => 'Mensen die lastig aan werk kunnen komen.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 8, 'identifier' => 'A2', 'choice_text' => 'De gemiddelde tijd die mensen nodig hebben om een baan te vinden', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 8, 'identifier' => 'A3', 'choice_text' => 'Hoe mensen afstand kunnen nemen van hun werk.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 9
            ['question_id' => 9, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 9, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 10
            ['question_id' => 10, 'identifier' => 'A1', 'choice_text' => 'Licht, matig, ernstig en zeer ernstig verstandelijke beperking', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 10, 'identifier' => 'A2', 'choice_text' => 'Licht, matig, meervoudig en diep verstandelijke beperking', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 10, 'identifier' => 'A3', 'choice_text' => 'Licht, gemiddeld, ernstig en zeer ernstig verstandelijke beperking', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 11
            ['question_id' => 11, 'identifier' => 'A1', 'choice_text' => 'Als je geen vaste woon- of verblijfplaats hebt.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 11, 'identifier' => 'A2', 'choice_text' => 'Als je geen verblijfsvergunning hebt.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 11, 'identifier' => 'A3', 'choice_text' => 'Als je niet met een adres ingeschreven staat in het bevolkingsregister.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 11, 'identifier' => 'A4', 'choice_text' => 'Bij tijdelijke thuisloosheid.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 11, 'identifier' => 'A5', 'choice_text' => 'Bij weggelopen jongeren.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 12
            ['question_id' => 12, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 12, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 13
            ['question_id' => 13, 'identifier' => 'A1', 'choice_text' => 'Volwassenen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 13, 'identifier' => 'A2', 'choice_text' => 'Ouderen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 13, 'identifier' => 'A3', 'choice_text' => 'Bejaarden', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 14
            ['question_id' => 14, 'identifier' => 'A1', 'choice_text' => 'Analfabetisme', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 14, 'identifier' => 'A2', 'choice_text' => 'Laaggeletterdheid', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 14, 'identifier' => 'A3', 'choice_text' => 'Dyslexie', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 15
            ['question_id' => 15, 'identifier' => 'A1', 'choice_text' => 'Leeftijdsgenoten', 'is_correct' => true, 'mapped_value' => 0.333333],
            ['question_id' => 15, 'identifier' => 'A2', 'choice_text' => 'Werkelijkheid', 'is_correct' => true, 'mapped_value' => 0.333333],
            ['question_id' => 15, 'identifier' => 'A3', 'choice_text' => 'Beroepskeuze', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 15, 'identifier' => 'A4', 'choice_text' => 'Oudere kinderen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 15, 'identifier' => 'A5', 'choice_text' => 'Zelfstandigheid', 'is_correct' => true, 'mapped_value' => 0.333333],
            ['question_id' => 15, 'identifier' => 'A6', 'choice_text' => 'Ouders', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 16
            ['question_id' => 16, 'identifier' => 'A1', 'choice_text' => '18 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 16, 'identifier' => 'A2', 'choice_text' => '21 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 16, 'identifier' => 'A3', 'choice_text' => '23 jaar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 17
            ['question_id' => 17, 'identifier' => 'A1', 'choice_text' => 'Cognitieve ontwikkeling', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 17, 'identifier' => 'A2', 'choice_text' => 'Seksuele ontwikkeling', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 17, 'identifier' => 'A3', 'choice_text' => 'Visuele ontwikkeling', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 18
            ['question_id' => 18, 'identifier' => 'A1', 'choice_text' => 'Iemand die in zijn eigen land terecht bang is voor vervolging of geweld.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 18, 'identifier' => 'A2', 'choice_text' => 'Iemand die de bescherming van een ander land inroept.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 18, 'identifier' => 'A3', 'choice_text' => 'Iemand die zoekt naar werk en daarvoor naar een ander land vertrekt.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 19
            ['question_id' => 19, 'identifier' => 'A1', 'choice_text' => 'De ouders kunnen tijdelijk niet het kind verzorgen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 19, 'identifier' => 'A2', 'choice_text' => 'Er is sprake van psychiatrische problemen bij (een van) de ouders.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 19, 'identifier' => 'A3', 'choice_text' => 'De kinderen gaan vier dagen per week naar de kinderopvang.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 20
            ['question_id' => 20, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 20, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 21
            ['question_id' => 21, 'identifier' => 'A1', 'choice_text' => 'Als het kind brutaal is tegen een volwassene.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 21, 'identifier' => 'A2', 'choice_text' => 'Als het kind zich langere tijd dwars en opstandig gedraagt.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 21, 'identifier' => 'A3', 'choice_text' => 'Als het kind iemand anders de schuld geeft van iets wat hij zelf heeft gedaan.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 22
            ['question_id' => 22, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 22, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 23
            ['question_id' => 23, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 23, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 24
            ['question_id' => 24, 'identifier' => 'A1', 'choice_text' => 'Financiële en juridische zaken', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 24, 'identifier' => 'A2', 'choice_text' => 'Opvoeden en opgroeien', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 24, 'identifier' => 'A3', 'choice_text' => 'Opleiding en onderwijs', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 25
            ['question_id' => 25, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 25, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 26
            ['question_id' => 26, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 26, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 27
            ['question_id' => 27, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 27, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 28
            ['question_id' => 28, 'identifier' => 'A1', 'choice_text' => 'Bereikbaarheidsinformatie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 28, 'identifier' => 'A2', 'choice_text' => 'Intakeprocedure', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 28, 'identifier' => 'A3', 'choice_text' => 'Vergoedingen door de gemeente', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 28, 'identifier' => 'A4', 'choice_text' => 'Huisregels', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 28, 'identifier' => 'A5', 'choice_text' => 'Alle antwoorden zijn juist.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 29
            ['question_id' => 29, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 29, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 30
            ['question_id' => 30, 'identifier' => 'A1', 'choice_text' => 'Werk en opleiding', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 30, 'identifier' => 'A2', 'choice_text' => 'Jeugd en opvoeding', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 30, 'identifier' => 'A3', 'choice_text' => 'Zorg en wonen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 30, 'identifier' => 'A4', 'choice_text' => 'Geboorte en overlijden', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 31
            ['question_id' => 31, 'identifier' => 'A1', 'choice_text' => 'Een Sociale Kaart bestrijkt een afgebakend gebied.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 31, 'identifier' => 'A2', 'choice_text' => 'Een Sociale Kaart moet regelmatig bijgewerkt worden.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 31, 'identifier' => 'A3', 'choice_text' => 'Een Sociale Kaart is gebonden aan een vaste vorm.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 32
            ['question_id' => 32, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 32, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 33
            ['question_id' => 33, 'identifier' => 'A1', 'choice_text' => 'Adresgegevens van de organisatie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 33, 'identifier' => 'A2', 'choice_text' => 'Website van de organisatie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 33, 'identifier' => 'A3', 'choice_text' => 'Organisatietype', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 33, 'identifier' => 'A4', 'choice_text' => 'Doel en werkwijze van de organisatie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 33, 'identifier' => 'A5', 'choice_text' => 'Alle antwoorden zijn juist.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 34
            ['question_id' => 34, 'identifier' => 'A1', 'choice_text' => 'Verwondingen of jeuk aan genitaliën', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A2', 'choice_text' => 'Pijn bij het lopen of zitten', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A3', 'choice_text' => 'Angst om op de rug te liggen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A4', 'choice_text' => 'Problemen bij het plassen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A5', 'choice_text' => 'Veel aan het lachen', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 35
            ['question_id' => 35, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 35, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 36
            ['question_id' => 36, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 36, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 37
            ['question_id' => 37, 'identifier' => 'A1', 'choice_text' => 'Samen met iemand anders verslaafd zijn.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 37, 'identifier' => 'A2', 'choice_text' => 'Verslaafd zijn aan het zorgen voor een verslaafde.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 37, 'identifier' => 'A3', 'choice_text' => 'Verslaafd zijn aan meerdere middelen tegelijk.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 38
            ['question_id' => 38, 'identifier' => 'A1', 'choice_text' => 'Hoge bloeddruk', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 38, 'identifier' => 'A2', 'choice_text' => 'Last van je gewrichten', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 38, 'identifier' => 'A3', 'choice_text' => 'Achteruitgang van het gezichtsvermogen', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 39
            ['question_id' => 39, 'identifier' => 'A1', 'choice_text' => 'Een verstoord lichaamsbeeld en daarbij zoveel mogelijk willen afvallen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 39, 'identifier' => 'A2', 'choice_text' => 'Een combinatie van eetbuien en de behoefte controle te houden over het eigen lichaamsgewicht.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 39, 'identifier' => 'A3', 'choice_text' => 'Het dwangmatig overdreven gezond proberen te eten.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 40
            ['question_id' => 40, 'identifier' => 'A1', 'choice_text' => 'Het kind is verlegen en terughoudend waardoor hij weinig oefent met taal.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 40, 'identifier' => 'A2', 'choice_text' => 'Beschadiging van het gehoor.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 40, 'identifier' => 'A3', 'choice_text' => 'Geen prikkelende thuissituatie.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 41
            ['question_id' => 41, 'identifier' => 'A1', 'choice_text' => 'Pester, gepeste, meeloper en zwijger', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 41, 'identifier' => 'A2', 'choice_text' => 'Pester, gepeste, beschermer, meeloper en zwijger', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 41, 'identifier' => 'A3', 'choice_text' => 'Pester, gepeste, beschermer, meeloper', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 42
            ['question_id' => 42, 'identifier' => 'A1', 'choice_text' => 'Het zien van gewelddadige films.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 42, 'identifier' => 'A2', 'choice_text' => 'Te weinig uren slapen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 42, 'identifier' => 'A3', 'choice_text' => 'Geen stabiele thuissituatie', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 43
            ['question_id' => 43, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 43, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 44
            ['question_id' => 44, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 44, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 45
            ['question_id' => 45, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 45, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 46
            ['question_id' => 46, 'identifier' => 'A1', 'choice_text' => 'Te weinig lichaamsbeweging.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 46, 'identifier' => 'A2', 'choice_text' => 'Verslaafd zijn aan het eten van producten met vet en suiker.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 46, 'identifier' => 'A3', 'choice_text' => 'Dagelijks met de fiets naar school of werk gaan.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 47
            ['question_id' => 47, 'identifier' => 'A1', 'choice_text' => 'minder dan 800.000', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 47, 'identifier' => 'A2', 'choice_text' => 'Tussen 800.000 en 900,000', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 47, 'identifier' => 'A3', 'choice_text' => '900.000 en meer', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 48
            ['question_id' => 48, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 48, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 49
            ['question_id' => 49, 'identifier' => 'A1', 'choice_text' => 'Stelt vragen over informatie die hij in tekstvorm heeft gekregen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 49, 'identifier' => 'A2', 'choice_text' => 'Heeft veel boeken in huis om zijn laaggeletterdheid te verbergen.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 49, 'identifier' => 'A3', 'choice_text' => 'Heeft vaak smoesjes om niet te hoeven lezen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 50
            ['question_id' => 50, 'identifier' => 'A1', 'choice_text' => 'Biologische factor', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 50, 'identifier' => 'A2', 'choice_text' => 'Sociaal culturele factoren', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 50, 'identifier' => 'A3', 'choice_text' => 'Migratie factoren', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 51
            ['question_id' => 51, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 51, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 52
            ['question_id' => 52, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 52, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 53
            ['question_id' => 53, 'identifier' => 'A1', 'choice_text' => 'Hij kan een verzetschrift indienen bij de rechtbank.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 53, 'identifier' => 'A2', 'choice_text' => 'Hij kan verder niks doen, de beslissing is bindend.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 53, 'identifier' => 'A3', 'choice_text' => 'Hij kan een nieuw bezwaarschrift indienen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 54
            ['question_id' => 54, 'identifier' => 'A1', 'choice_text' => 'Nee, het was een voorlopige voorziening ter overbrugging.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 54, 'identifier' => 'A2', 'choice_text' => 'Ja, de cliënt moet het betreffende bedrag van de voorlopig voorziening terugbetalen.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 54, 'identifier' => 'A3', 'choice_text' => 'De cliënt moet alleen een eigen bijdrage vergoeden.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 55
            ['question_id' => 55, 'identifier' => 'A1', 'choice_text' => '5 weken', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 55, 'identifier' => 'A2', 'choice_text' => '6 weken', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 55, 'identifier' => 'A3', 'choice_text' => '4 weken', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 56
            ['question_id' => 56, 'identifier' => 'A1', 'choice_text' => 'Het aanvragen van een voorlopige voorziening.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 56, 'identifier' => 'A2', 'choice_text' => 'Het aanvragen van een tegemoetkoming in de onkosten.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 56, 'identifier' => 'A3', 'choice_text' => 'Het aanvragen van een voorschot op zijn uitkering.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 57
            ['question_id' => 57, 'identifier' => 'A1', 'choice_text' => 'Ja, de uitkering wordt voorgezet tijdens de bezwaarprocedure.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 57, 'identifier' => 'A2', 'choice_text' => 'Nee, de beslissing om de uitkering te stoppen is direct geldig.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 57, 'identifier' => 'A3', 'choice_text' => 'De cliënt krijgt een standaardvergoeding tijdens de bezwaarprocedure.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 58
            ['question_id' => 58, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 58, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 59
            ['question_id' => 59, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 59, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 60 (orderInteraction - multiple correct answers)
            ['question_id' => 60, 'identifier' => 'A1', 'choice_text' => 'Vooronderzoek', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 60, 'identifier' => 'A2', 'choice_text' => 'Rechtszitting', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 60, 'identifier' => 'A3', 'choice_text' => 'Getuigen en deskundigen', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 60, 'identifier' => 'A4', 'choice_text' => 'Uitspraak', 'is_correct' => true, 'mapped_value' => 0.0],
            
            // Question 61
            ['question_id' => 61, 'identifier' => 'A1', 'choice_text' => 'Een bijdrage in de kosten van de rechtspraak.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 61, 'identifier' => 'A2', 'choice_text' => 'Het recht voor ondersteunende diensten bij een rechtspraak.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 61, 'identifier' => 'A3', 'choice_text' => 'Een tegemoetkoming in de kosten van de rechtspraak.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 62
            ['question_id' => 62, 'identifier' => 'A1', 'choice_text' => 'De uitleg waarom je het niet met het besluit eens bent.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 62, 'identifier' => 'A2', 'choice_text' => 'Een kopie van je ID of paspoort.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 62, 'identifier' => 'A3', 'choice_text' => 'Een kopie van het besluit waartegen je bezwaar maakt.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 63
            ['question_id' => 63, 'identifier' => 'A1', 'choice_text' => 'Beroepschrift', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 63, 'identifier' => 'A2', 'choice_text' => 'Bezwaarschrift', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 63, 'identifier' => 'A3', 'choice_text' => 'Verzetschrift', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 64
            ['question_id' => 64, 'identifier' => 'A1', 'choice_text' => 'De kosten die de cliënt maakt zijn noodzakelijk.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 64, 'identifier' => 'A2', 'choice_text' => 'Het gaat om onverwachte kosten die zijn ontstaan door bijzondere omstandigheden.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 64, 'identifier' => 'A3', 'choice_text' => 'Het gaat om maandelijks terugkerende kosten die de cliënt niet kan betalen.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 65
            ['question_id' => 65, 'identifier' => 'A1', 'choice_text' => 'Een maand voor afloop van de ww uitkering.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 65, 'identifier' => 'A2', 'choice_text' => 'Een week voor afloop van de ww uitkering.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 65, 'identifier' => 'A3', 'choice_text' => 'Op de dag dat de ww uitkering afloopt.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 66
            ['question_id' => 66, 'identifier' => 'A1', 'choice_text' => 'Provincie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 66, 'identifier' => 'A2', 'choice_text' => 'Gemeente', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 66, 'identifier' => 'A3', 'choice_text' => 'Overheid', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 67
            ['question_id' => 67, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 67, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 68
            ['question_id' => 68, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 68, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 69
            ['question_id' => 69, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 69, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 70
            ['question_id' => 70, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 70, 'identifier' => 'A2', 'choice_text' => '', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 71
            ['question_id' => 71, 'identifier' => 'A1', 'choice_text' => 'Meneer Kandemir is 21 en heeft geen of weinig inkomen en vermogen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 71, 'identifier' => 'A2', 'choice_text' => 'Meneer De Boer is 64 jaar en heeft weinig kans op een baan of op hogere inkomsten', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 71, 'identifier' => 'A3', 'choice_text' => 'Mevrouw Highland is 18 jaar en heeft geen of weinig inkomen en vermogen.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 72
            ['question_id' => 72, 'identifier' => 'A1', 'choice_text' => 'Voor jongeren die al studeren, maar niet kunnen bijverdienen vanwege een medische beperking.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 72, 'identifier' => 'A2', 'choice_text' => 'Voor jongeren met een medische beperking die een opleiding willen gaan volgen, maar deze niet kunnen betalen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 72, 'identifier' => 'A3', 'choice_text' => 'Voor studenten die niet kunnen bijverdienen naast hun studie vanwege een psychische stoornis.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 73
            ['question_id' => 73, 'identifier' => 'A1', 'choice_text' => 'Een vergoeding van noodzakelijke extra kosten die iemand met een laag inkomen moet maken door bijzondere omstandigheden.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 73, 'identifier' => 'A2', 'choice_text' => 'Een vaste maandelijkse bijdrage voor mensen met een laag inkomen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 73, 'identifier' => 'A3', 'choice_text' => 'Een vergoeding voor gezinnen met een laag inkomen om bijvoorbeeld een gezinsuitje te kunnen maken.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 74
            ['question_id' => 74, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 74, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 75
            ['question_id' => 75, 'identifier' => 'A1', 'choice_text' => 'Algemene Veiligheid Gegevensbescherming', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 75, 'identifier' => 'A2', 'choice_text' => 'Algemene Verordening Gegevensbescherming', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 75, 'identifier' => 'A3', 'choice_text' => 'Algemene Verordening Gegevensbeheer', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 76
            ['question_id' => 76, 'identifier' => 'A1', 'choice_text' => 'Digitaal paspoort', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 76, 'identifier' => 'A2', 'choice_text' => 'Digitaal bankieren', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 76, 'identifier' => 'A3', 'choice_text' => 'Digitaal netwerk omgeving', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 77
            ['question_id' => 77, 'identifier' => 'A1', 'choice_text' => 'Een wiskundige formule.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 77, 'identifier' => 'A2', 'choice_text' => 'Het bereiden van een maaltijd.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 77, 'identifier' => 'A3', 'choice_text' => 'Een rekensom.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 77, 'identifier' => 'A4', 'choice_text' => 'Alle antwoorden zijn goed.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 78
            ['question_id' => 78, 'identifier' => 'A1', 'choice_text' => 'Synchroniseren', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 78, 'identifier' => 'A2', 'choice_text' => 'Nepnieuws', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 78, 'identifier' => 'A3', 'choice_text' => 'Muziek onder een filmpje plaatsen', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 79
            ['question_id' => 79, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 79, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 80
            ['question_id' => 80, 'identifier' => 'A1', 'choice_text' => 'Mediawijsheid', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 80, 'identifier' => 'A2', 'choice_text' => 'Mediatheek', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 80, 'identifier' => 'A3', 'choice_text' => 'Sociale media', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 81
            ['question_id' => 81, 'identifier' => 'A1', 'choice_text' => 'Een hoax', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 81, 'identifier' => 'A2', 'choice_text' => 'Klikfraude', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 81, 'identifier' => 'A3', 'choice_text' => 'Een online marketing stunt', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 82
            ['question_id' => 82, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 82, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 83
            ['question_id' => 83, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 83, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 84
            ['question_id' => 84, 'identifier' => 'A1', 'choice_text' => 'Je legt de cliënt op bed.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 84, 'identifier' => 'A2', 'choice_text' => 'Je belt direct 112 of de spoedlijn van de huisarts.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 84, 'identifier' => 'A3', 'choice_text' => 'Je brengt de cliënt met de auto naar de spoedeisende hulp.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 85
            ['question_id' => 85, 'identifier' => 'A1', 'choice_text' => 'Zelfvertrouwen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 85, 'identifier' => 'A2', 'choice_text' => 'Vitaliteit', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 85, 'identifier' => 'A3', 'choice_text' => 'Stress', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 86
            ['question_id' => 86, 'identifier' => 'A1', 'choice_text' => 'Autisme (klassiek)', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 86, 'identifier' => 'A2', 'choice_text' => 'ADHD', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 86, 'identifier' => 'A3', 'choice_text' => 'PDD-NOS', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 87
            ['question_id' => 87, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 87, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 88
            ['question_id' => 88, 'identifier' => 'A1', 'choice_text' => 'Angststoornis', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 88, 'identifier' => 'A2', 'choice_text' => 'Schizofrenie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 88, 'identifier' => 'A3', 'choice_text' => 'Borderline', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 89
            ['question_id' => 89, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 89, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 90
            ['question_id' => 90, 'identifier' => 'A1', 'choice_text' => 'Wanen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 90, 'identifier' => 'A2', 'choice_text' => 'Hallucinaties', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 90, 'identifier' => 'A3', 'choice_text' => 'Gespleten persoonlijkheid', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 91
            ['question_id' => 91, 'identifier' => 'A1', 'choice_text' => 'Je adviseert de cliënt tijgerbalsem op de pijnlijke gewrichten te smeren.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 91, 'identifier' => 'A2', 'choice_text' => 'Je adviseert de cliënt oefeningen te gaan doen om de gewrichten soepel te houden.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 91, 'identifier' => 'A3', 'choice_text' => 'Je adviseert de cliënt een afspraak te maken met de huisarts.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 92
            ['question_id' => 92, 'identifier' => 'A1', 'choice_text' => 'Mazelen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 92, 'identifier' => 'A2', 'choice_text' => 'Waterpokken', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 92, 'identifier' => 'A3', 'choice_text' => 'De 7e kinderziekte', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 93
            ['question_id' => 93, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 1.0],
            ['question_id' => 93, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 0.0],
            
            // Question 94
            ['question_id' => 94, 'identifier' => 'A1', 'choice_text' => 'Het niet meer goed kunnen onthouden van informatie die langere tijd in het geheugen zat.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 94, 'identifier' => 'A2', 'choice_text' => 'Het niet meer goed kunnen uitvoeren van handelingen in de juiste volgorde.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 94, 'identifier' => 'A3', 'choice_text' => 'Het niet meer goed kunnen bewegen door de achteruitgang van de hersenactiviteit.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 95
            ['question_id' => 95, 'identifier' => 'A1', 'choice_text' => 'Post Traumatische Stress Stoornis', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 95, 'identifier' => 'A2', 'choice_text' => 'Positief Programma Samen Sterk', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 95, 'identifier' => 'A3', 'choice_text' => 'Post Traumatische Somatieve Stoornis', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 96
            ['question_id' => 96, 'identifier' => 'A1', 'choice_text' => 'Beroerte', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 96, 'identifier' => 'A2', 'choice_text' => 'Depressie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 96, 'identifier' => 'A3', 'choice_text' => 'Dementie', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 97
            ['question_id' => 97, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 97, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 98
            ['question_id' => 98, 'identifier' => 'A1', 'choice_text' => 'Paniekstoornis', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 98, 'identifier' => 'A2', 'choice_text' => 'Angststoornis', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 98, 'identifier' => 'A3', 'choice_text' => 'Psychose', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 99
            ['question_id' => 99, 'identifier' => 'A1', 'choice_text' => 'Kortademigheid', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 99, 'identifier' => 'A2', 'choice_text' => 'Vermoeidheid', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 99, 'identifier' => 'A3', 'choice_text' => 'Gewrichtspijn', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 100
            ['question_id' => 100, 'identifier' => 'A1', 'choice_text' => 'Luisteren, samenvatten, doorvragen', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 100, 'identifier' => 'A2', 'choice_text' => 'Luisteren, suggestie, doorvragen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 100, 'identifier' => 'A3', 'choice_text' => 'Luisteren, samenvatten, denken', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 101
            ['question_id' => 101, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 101, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 102
            ['question_id' => 102, 'identifier' => 'A1', 'choice_text' => 'Televisie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 102, 'identifier' => 'A2', 'choice_text' => 'Krant', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 102, 'identifier' => 'A3', 'choice_text' => 'Emoticons', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 102, 'identifier' => 'A4', 'choice_text' => 'Internet', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 102, 'identifier' => 'A5', 'choice_text' => 'Alle antwoorden zijn juist.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 103
            ['question_id' => 103, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 103, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 104
            ['question_id' => 104, 'identifier' => 'A1', 'choice_text' => 'Altijd, Navragen, Nooit, Aannemen', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 104, 'identifier' => 'A2', 'choice_text' => 'Altijd, Navragen, Niet, Aannemen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 104, 'identifier' => 'A3', 'choice_text' => 'Altijd, Nadenken, Nooit, Aannemen', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 105
            ['question_id' => 105, 'identifier' => 'A1', 'choice_text' => 'Niet invullen voor een ander.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 105, 'identifier' => 'A2', 'choice_text' => 'Nooit interpreteren voor een ander.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 105, 'identifier' => 'A3', 'choice_text' => 'Nadenken, invullen, verwoorden, ervaren en aannemen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 106
            ['question_id' => 106, 'identifier' => 'A1', 'choice_text' => 'Wat is de huidige situatie van de cliënt?', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 106, 'identifier' => 'A2', 'choice_text' => 'Waar heeft de cliënt ondersteuning bij nodig?', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 106, 'identifier' => 'A3', 'choice_text' => 'Welke medische zorg is er noodzakelijk?', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 107
            ['question_id' => 107, 'identifier' => 'A1', 'choice_text' => 'Het stellen van open vragen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 107, 'identifier' => 'A2', 'choice_text' => 'Het invullen voor de ander', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 107, 'identifier' => 'A3', 'choice_text' => 'Het laten vallen van stiltes', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 108
            ['question_id' => 108, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 108, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 109
            ['question_id' => 109, 'identifier' => 'A1', 'choice_text' => 'Gebruik LSD', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 109, 'identifier' => 'A2', 'choice_text' => 'Neem ANNE mee', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 109, 'identifier' => 'A3', 'choice_text' => 'Laat OMA thuis', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 110
            ['question_id' => 110, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 110, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 111
            ['question_id' => 111, 'identifier' => 'A1', 'choice_text' => 'Sociale raadslieden werk', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 111, 'identifier' => 'A2', 'choice_text' => 'Sociale rechten en wetten', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 111, 'identifier' => 'A3', 'choice_text' => 'Specifieke rechten en wetten', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 112
            ['question_id' => 112, 'identifier' => 'A1', 'choice_text' => 'Problemen met eenzaamheid.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 112, 'identifier' => 'A2', 'choice_text' => 'Problemen in de omgang met anderen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 112, 'identifier' => 'A3', 'choice_text' => 'Vragen rondom eigen functioneren.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 112, 'identifier' => 'A4', 'choice_text' => 'Antwoord A en C zijn goed.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 112, 'identifier' => 'A5', 'choice_text' => 'Alle antwoorden zijn goed.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 113
            ['question_id' => 113, 'identifier' => 'A1', 'choice_text' => 'Het is een tijdelijke verblijfsplek.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 113, 'identifier' => 'A2', 'choice_text' => 'Je hoeft niet aan de regio verbonden te zijn.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 113, 'identifier' => 'A3', 'choice_text' => 'Het is bedoeld voor gezinnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 114
            ['question_id' => 114, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 114, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 115
            ['question_id' => 115, 'identifier' => 'A1', 'choice_text' => 'Loon of uitkering', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 115, 'identifier' => 'A2', 'choice_text' => 'Belastingaanslagen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 115, 'identifier' => 'A3', 'choice_text' => 'Letselschade', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 116
            ['question_id' => 116, 'identifier' => 'A1', 'choice_text' => 'Schuldbemiddeling', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 116, 'identifier' => 'A2', 'choice_text' => 'Saneringskrediet', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 116, 'identifier' => 'A3', 'choice_text' => 'Schuldsanering', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 117
            ['question_id' => 117, 'identifier' => 'A1', 'choice_text' => 'Het regelen van (medische) zorg in de opvang.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 117, 'identifier' => 'A2', 'choice_text' => 'Het vinden van een geheim adres, als dat nodig is.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 117, 'identifier' => 'A3', 'choice_text' => 'Het emigreren naar een ander land.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 118
            ['question_id' => 118, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 118, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 119
            ['question_id' => 119, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 119, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 120
            ['question_id' => 120, 'identifier' => 'A1', 'choice_text' => 'Beroepsethiek', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 120, 'identifier' => 'A2', 'choice_text' => 'Morele plicht', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 120, 'identifier' => 'A3', 'choice_text' => 'Beroepscode', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 121
            ['question_id' => 121, 'identifier' => 'A1', 'choice_text' => 'Je moet kiezen uit twee of meer keuzes.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 121, 'identifier' => 'A2', 'choice_text' => 'Het onderwerp gaat over waarden en normen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 121, 'identifier' => 'A3', 'choice_text' => 'Er is altijd een juiste keuze te maken.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 122
            ['question_id' => 122, 'identifier' => 'A1', 'choice_text' => 'De analyse', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 122, 'identifier' => 'A2', 'choice_text' => 'De besluitvorming', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 122, 'identifier' => 'A3', 'choice_text' => 'De consequentie', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 123
            ['question_id' => 123, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 123, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 124
            ['question_id' => 124, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 124, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 125
            ['question_id' => 125, 'identifier' => 'A1', 'choice_text' => 'Beroepsdilemma', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 125, 'identifier' => 'A2', 'choice_text' => 'Ethisch dilemma', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 125, 'identifier' => 'A3', 'choice_text' => 'Sociaal dilemma', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 126
            ['question_id' => 126, 'identifier' => 'A1', 'choice_text' => 'Waarden die zijn vastgelegd in protocollen en regelingen.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 126, 'identifier' => 'A2', 'choice_text' => 'Waarden die niet zijn vastgelegd in protocollen en regelingen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 126, 'identifier' => 'A3', 'choice_text' => 'Algemene regels die iedereen vanzelfsprekend vindt.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 127
            ['question_id' => 127, 'identifier' => 'A1', 'choice_text' => 'Beroepsethiek', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 127, 'identifier' => 'A2', 'choice_text' => 'Protocollen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 127, 'identifier' => 'A3', 'choice_text' => 'Huisreglement', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 128
            ['question_id' => 128, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 128, 'identifier' => 'A2', 'choice_text' => '', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 129
            ['question_id' => 129, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 129, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 130
            ['question_id' => 130, 'identifier' => 'A1', 'choice_text' => 'Situatie, Taak, Actie, Resultaat, Reflectie, Transfer', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 130, 'identifier' => 'A2', 'choice_text' => 'Situatie, Tijd, Actie, Resultaat, Reflectie, Transfer', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 130, 'identifier' => 'A3', 'choice_text' => 'Situatie, Taak, Actie, Reactie, Reflectie, Transfer', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 131 (multiple correct answers)
            ['question_id' => 131, 'identifier' => 'A1', 'choice_text' => 'Handelen', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 131, 'identifier' => 'A2', 'choice_text' => 'Terugblikken', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 131, 'identifier' => 'A3', 'choice_text' => 'Bewustwording', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 131, 'identifier' => 'A4', 'choice_text' => 'Alternatieven ontwikkelen', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 131, 'identifier' => 'A5', 'choice_text' => 'Uitproberen', 'is_correct' => true, 'mapped_value' => 0.0],
            
            // Question 132
            ['question_id' => 132, 'identifier' => 'A1', 'choice_text' => 'Stap 4', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 132, 'identifier' => 'A2', 'choice_text' => 'Stap 2', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 132, 'identifier' => 'A3', 'choice_text' => 'Stap 3', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 133
            ['question_id' => 133, 'identifier' => 'A1', 'choice_text' => 'Evalueren', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 133, 'identifier' => 'A2', 'choice_text' => 'Reflecteren', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 133, 'identifier' => 'A3', 'choice_text' => 'Intervisie', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 134
            ['question_id' => 134, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 134, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 135 (multiple correct answers)
            ['question_id' => 135, 'identifier' => 'A1', 'choice_text' => 'Beschrijving', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 135, 'identifier' => 'A2', 'choice_text' => 'Gevoelens', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 135, 'identifier' => 'A3', 'choice_text' => 'Evaluatie', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 135, 'identifier' => 'A4', 'choice_text' => 'Analyse', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 135, 'identifier' => 'A5', 'choice_text' => 'Conclusies', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 135, 'identifier' => 'A6', 'choice_text' => 'Actieplan', 'is_correct' => true, 'mapped_value' => 0.0],
            
            // Question 136
            ['question_id' => 136, 'identifier' => 'A1', 'choice_text' => 'E: Wat had je eventueel anders kunnen doen?<br />F: Ben je tevreden over hoe je hebt gehandeld?', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 136, 'identifier' => 'A2', 'choice_text' => 'E: Wat was het effect van wat je deed?<br />F: Ben je tevreden over hoe je hebt gehandeld?', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 136, 'identifier' => 'A3', 'choice_text' => 'E: Wat was het effect van wat je deed?<br />F: Wat is je volgende stap?', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 136, 'identifier' => 'A4', 'choice_text' => 'E: Wat had je eventueel anders kunnen doen?<br />F: Wat is je volgende stap?', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 137
            ['question_id' => 137, 'identifier' => 'A1', 'choice_text' => 'STARTT', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 137, 'identifier' => 'A2', 'choice_text' => 'ABCD', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 137, 'identifier' => 'A3', 'choice_text' => 'STARRT', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 138
            ['question_id' => 138, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 138, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 139
            ['question_id' => 139, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 139, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 140
            ['question_id' => 140, 'identifier' => 'A1', 'choice_text' => 'Het recht om aan de privacyregels voorbij te gaan.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 140, 'identifier' => 'A2', 'choice_text' => 'Het recht om aan andere hulpverleningsorganisatie persoonsgegevens door te geven.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 140, 'identifier' => 'A3', 'choice_text' => 'Het recht om persoonsgegevens van volwassenen en kinderen door te geven aan Veilig Thuis.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 141
            ['question_id' => 141, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 141, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 142
            ['question_id' => 142, 'identifier' => 'A1', 'choice_text' => 'Geïndiceerde preventie voor gezinnen met een verhoogd risico.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 142, 'identifier' => 'A2', 'choice_text' => 'Interventies bij vroege signalen voor individuele gezinnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 142, 'identifier' => 'A3', 'choice_text' => 'Interventie ter voorkoming van voortijdig schooluitval.', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 143 (multiple correct answers)
            ['question_id' => 143, 'identifier' => 'A1', 'choice_text' => 'Breng signalen in kaart.', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 143, 'identifier' => 'A2', 'choice_text' => 'Overleg met een deskundige collega of veilig thuis.', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 143, 'identifier' => 'A3', 'choice_text' => 'Praat met ouders of verzorgers.', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 143, 'identifier' => 'A4', 'choice_text' => 'Weeg het geweld.', 'is_correct' => true, 'mapped_value' => 0.0],
            ['question_id' => 143, 'identifier' => 'A5', 'choice_text' => 'Beslis: Is melden nodig? Is hulpverlening nodig?', 'is_correct' => true, 'mapped_value' => 0.0],
            
            // Question 144
            ['question_id' => 144, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 144, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 145
            ['question_id' => 145, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 145, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 146
            ['question_id' => 146, 'identifier' => 'A1', 'choice_text' => 'Afwegingskader', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 146, 'identifier' => 'A2', 'choice_text' => 'Afmeldingskader', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 146, 'identifier' => 'A3', 'choice_text' => 'Aanmeldingskader', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 147
            ['question_id' => 147, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 147, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 148
            ['question_id' => 148, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 148, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 149
            ['question_id' => 149, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 149, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 150
            ['question_id' => 150, 'identifier' => 'A1', 'choice_text' => 'Informele netwerk', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 150, 'identifier' => 'A2', 'choice_text' => 'Formele netwerk', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 150, 'identifier' => 'A3', 'choice_text' => 'Sociale netwerk', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 151
            ['question_id' => 151, 'identifier' => 'A1', 'choice_text' => 'Belangenorganisatie', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 151, 'identifier' => 'A2', 'choice_text' => 'Consumentenorganisatie', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 151, 'identifier' => 'A3', 'choice_text' => 'Patiëntenorganisatie', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 152
            ['question_id' => 152, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 152, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 153
            ['question_id' => 153, 'identifier' => 'A1', 'choice_text' => 'Wijkagent', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 153, 'identifier' => 'A2', 'choice_text' => 'Mantelzorgers', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 153, 'identifier' => 'A3', 'choice_text' => 'Ervaringsdeskundigen', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 154
            ['question_id' => 154, 'identifier' => 'A1', 'choice_text' => 'CNVO', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 154, 'identifier' => 'A2', 'choice_text' => 'FNV', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 154, 'identifier' => 'A3', 'choice_text' => 'UMCU', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 155
            ['question_id' => 155, 'identifier' => 'A1', 'choice_text' => 'Sociale cohesie in de wijk', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 155, 'identifier' => 'A2', 'choice_text' => 'Verenigingsleven in de buurt', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 155, 'identifier' => 'A3', 'choice_text' => 'Organiseren van buurtfeesten/activiteiten', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 156
            ['question_id' => 156, 'identifier' => 'A1', 'choice_text' => 'Belangenorganisatie<br /><br />', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 156, 'identifier' => 'A2', 'choice_text' => 'Zelfhulporganisatie', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 156, 'identifier' => 'A3', 'choice_text' => 'Samenlevingsverbanden', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 157
            ['question_id' => 157, 'identifier' => 'A1', 'choice_text' => 'Wijkanalyse', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 157, 'identifier' => 'A2', 'choice_text' => 'Kwalitatief onderzoek', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 157, 'identifier' => 'A3', 'choice_text' => 'Kwantitatief onderzoek', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 158
            ['question_id' => 158, 'identifier' => 'A1', 'choice_text' => 'Een groep waarin lotgenoten met elkaar in gesprek gaan, zonder tussenkomst van de hulpverlening.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 158, 'identifier' => 'A2', 'choice_text' => 'Een groep waarin lotgenoten met elkaar in gesprek gaan, met een hulpverlener op de achtergrond', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 158, 'identifier' => 'A3', 'choice_text' => 'Een groep waarin lotgenoten met elkaar in gesprek gaan, met tussenkomst van de hulpverlening.', 'is_correct' => false, 'mapped_value' => 0.0],
        ];

        foreach ($choices as $choice) {
            Choice::create($choice);
        }
    }
}

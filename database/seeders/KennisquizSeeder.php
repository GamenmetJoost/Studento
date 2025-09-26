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
            ['id' => 1, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_972cb5fb4a', 'question_text' => 'Is de volgende stelling waar of niet waar? Mensen met een alcoholverslaving vormen veruit de grootste groep in de verslavingszorg.', 'category_id' => 1],
            ['id' => 2, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e263f083b5', 'question_text' => 'Binnen welke leeftijdsgrens valt de volwassen fase?', 'category_id' => 1],
            ['id' => 3, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e4e595190b', 'question_text' => 'Is de volgende stelling waar of niet waar? Iemand met een verstandelijke beperking heeft een IQ van maximaal 80.', 'category_id' => 1],
            ['id' => 4, 'identifier' => 'choiceInteraction_LARGESOURCE_MANYCHOICE_f9bd9d930b', 'question_text' => 'Wat is geen signaal van een gokverslaving? Er zijn twee antwoorden goed.', 'category_id' => 1],
            ['id' => 5, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_3397575086', 'question_text' => 'Is de volgende stelling waar of niet waar? Grove motoriek heeft betrekking op kleine bewegingen zoals tekenen en schrijven.', 'category_id' => 1],
            ['id' => 24, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_f9429b8081', 'question_text' => 'Onder welke rubriek van de Sociale Kaart kan je informatie vinden over de WMO?', 'category_id' => 2],
            ['id' => 25, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_e7988d0957', 'question_text' => 'Is de volgende stelling waar of niet waar? In een Sociale Kaart vinden burgers en hulpverleners informatie over organisaties en hun aanbod op het gebied van wonen, welzijn en zorg in de omgeving.', 'category_id' => 2],
            ['id' => 34, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_cd5ed0ce10', 'question_text' => 'Wat is geen mogelijk signaal bij seksueel misbruik bij kinderen?', 'category_id' => 3],
            ['id' => 53, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_358ed86be3', 'question_text' => 'De zaak van je cliënt is op basis van de stukken behandeld (dus zonder zitting) omdat de rechter meent dat de zaak heel eenvoudig is. Je cliënt is het echter niet eens met de beslissing van de rechter. Welke vervolgstap kan je cliënt zetten?', 'category_id' => 4],
            ['id' => 100, 'identifier' => 'choiceInteraction_LARGESOURCE_MULTIPLECHOICE_gesprekstechnieken_001', 'question_text' => 'Welke drie basistechnieken worden veel gebruikt in gesprekstechnieken?', 'category_id' => 8],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }

    private function seedChoices()
    {
        $choices = [
            // Question 1 choices
            ['question_id' => 1, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 1, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 2 choices
            ['question_id' => 2, 'identifier' => 'A1', 'choice_text' => 'De leeftijdsgrens van 21 - 67 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 2, 'identifier' => 'A2', 'choice_text' => 'Er is geen duidelijke leeftijdsgrens.', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 2, 'identifier' => 'A3', 'choice_text' => 'De leeftijdsgrens van 20 - 70 jaar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 3 choices
            ['question_id' => 3, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 3, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 4 choices (multiple correct)
            ['question_id' => 4, 'identifier' => 'A1', 'choice_text' => 'Wegblijven van school of werk.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 4, 'identifier' => 'A2', 'choice_text' => 'Ander voorliegen dat je geld hebt gewonnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 4, 'identifier' => 'A3', 'choice_text' => 'Geld lenen en dit weer terug betalen.', 'is_correct' => true, 'mapped_value' => 0.5],
            ['question_id' => 4, 'identifier' => 'A4', 'choice_text' => 'Blijven gokken om je verloren geld terug te winnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 4, 'identifier' => 'A5', 'choice_text' => 'Wel willen stoppen met gokken, maar het niet kunnen.', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 5 choices
            ['question_id' => 5, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 5, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 24 choices (Sociale Kaart category)
            ['question_id' => 24, 'identifier' => 'A1', 'choice_text' => 'Financiële en juridische zaken', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 24, 'identifier' => 'A2', 'choice_text' => 'Opvoeden en opgroeien', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 24, 'identifier' => 'A3', 'choice_text' => 'Opleiding en onderwijs', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 25 choices
            ['question_id' => 25, 'identifier' => 'A1', 'choice_text' => 'Waar', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 25, 'identifier' => 'A2', 'choice_text' => 'Niet waar', 'is_correct' => false, 'mapped_value' => 0.0],
            
            // Question 34 choices (Signalen herkennen category)
            ['question_id' => 34, 'identifier' => 'A1', 'choice_text' => 'Verwondingen of jeuk aan genitaliën', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A2', 'choice_text' => 'Pijn bij het lopen or zitten', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A3', 'choice_text' => 'Angst om op de rug te liggen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A4', 'choice_text' => 'Problemen bij het plassen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 34, 'identifier' => 'A5', 'choice_text' => 'Veel aan het lachen', 'is_correct' => true, 'mapped_value' => 1.0],
            
            // Question 100 choices (Gesprekstechnieken)
            ['question_id' => 100, 'identifier' => 'A1', 'choice_text' => 'Luisteren, samenvatten, doorvragen', 'is_correct' => true, 'mapped_value' => 1.0],
            ['question_id' => 100, 'identifier' => 'A2', 'choice_text' => 'Luisteren, suggestie, doorvragen', 'is_correct' => false, 'mapped_value' => 0.0],
            ['question_id' => 100, 'identifier' => 'A3', 'choice_text' => 'Luisteren, samenvatten, denken', 'is_correct' => false, 'mapped_value' => 0.0],
        ];

        foreach ($choices as $choice) {
            Choice::create($choice);
        }
    }
}

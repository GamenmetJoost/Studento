# 🎓 Studento Projecto

**Studento Projecto** is een programma waarmee studenten op een leuke, **gamified** manier vragen kunnen beantwoorden. Zo leren ze de lesstof beter kennen en onthouden. Docenten kunnen vragen beheren en statistieken van studenten inzien.

---

## 🛠️ Technologieën
- **Laravel 12** (PHP 8.4)
- **SQLite**
- **TailwindCSS**

---

## 🚀 Installatie

Volg deze stappen om het project lokaal te draaien:

```bash
# Clone de repository
git clone https://github.com/jouwgebruikersnaam/studento-projecto.git
cd studento-projecto

# Installeer dependencies
composer install

# Maak de SQLite database aan
New-Item .\database\database.sqlite

# Kopieer het .env bestand
copy .env.example .env

# Genereer de app key
php artisan key:generate

# Voer migraties en seeders uit
php artisan migrate:fresh --seed

# Compileer frontend assets
npm install
npm run dev
```

---

## ▶️ Gebruik

1. Start de server:
   ```bash
   php artisan serve
   ```
2. Open de app in je browser: [http://localhost:8000](http://localhost:8000)  
3. Log in met een van de dummy-accounts:
   - **Admin** → `test@admin.com`  
   - **Student** → `student@admin.com`  
4. Gebruik het wachtwoord `Test1234`
---

## ✨ Features
- ✅ Vragen beantwoorden in een gamified omgeving  
- ✅ Leaderboards en scoresysteem  
- ✅ Statistieken voor docenten (resultaten & voortgang van studenten)  
- ✅ Beheeromgeving voor het toevoegen en importeren van vragen  
- ✅ Responsieve interface dankzij TailwindCSS  

---

## 📂 Projectstructuur
```plaintext
studento-projecto/
├── app/            # Applicatielogica (Laravel)
├── database/       # Migrations, seeders en SQLite database
├── public/         # Publieke bestanden
├── resources/      # Views en assets (Tailwind)
├── routes/         # Web- en API-routes
└── tests/          # Testbestanden
```

---

## 🤝 Contributie
Dit project is ontwikkeld in teamverband en is niet open voor externe bijdragen.  

---

## 🧑‍💻 Auteurs
Gemaakt door:  
- Marvin  
- Wouter  
- Joost  
- Floris  

---

Wie deed wat?  
- Marvin heeft de opmaak gemaakt.  
- Wouter heeft het leaderboard en badges gemaakt.
- Joost heeft het admin dashboard en gemaakt.
- Floris heeft de statistieken, alle onderwerpen pagina en dashboard functies gemaakt.

<h1>Codes Searcher - zadanie testowe</h1>

<h2>Instalacja</h2>
1. Należy utworzyć bazę danych "codes-searcher" w MySQL (+ opcjonalnie zmienić dane połączenia w pliku .env)
2. Wykonać migrację "php artisan migrate" - tabela "codes" wypełniona jest losowymi wartościami
3. Plik "app.php" z katalogu "config_example" podmienić w folderze "config"

<h2>Użycie</h2>
API dostępne jest pod adresem <b>"/api/search" (POST)</b> i obsługuje parametry:
name - używane porównanie "LIKE %x%"
code - dokładne porównanie
Zakres dat lub od/do:
date_from, date_to

API nie wymaga użycia tokena.
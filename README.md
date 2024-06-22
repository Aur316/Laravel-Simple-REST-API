# Smart Leap Services - Próbafeladat

## Leírás

Ez a projekt egy egyszerű Laravel alapú REST API, amely munkásokat (workers), ügyfeleket (costumers) és feladatokat (tasks) kezel. A rendszer lehetővé teszi az alapvető CRUD műveleteket mindhárom entitás esetében.

## Telepítés

1. **Projekt klónozása:**

    ```bash
    git clone <repository-url>
    cd <repository-directory>

    ```

2. **Dependenciák telepítése:**

    ```bash
    composer install

    ```

3. **.env fájl beállítása:**

Másold le az .env.example fájlt .env néven, majd állítsd be az adatbázis kapcsolódási adatokat.

4. **Adatbázis migrálása:**

    ```bash
    php artisan migrate

    ```

5. **Szerver indítása:**

    ```bash
    php artisan serve
    ```

**API végpontok:**

**1 Workers:**

GET /api/workers - Összes worker lekérdezése
POST /api/workers - Új worker hozzáadása
PUT /api/workers/{id} - Meglévő worker frissítése
DELETE /api/workers/{id} - Worker törlése

**2 Costumers:**

GET /api/costumers - Összes costumer lekérdezése
POST /api/costumers - Új costumer hozzáadása
PUT /api/costumers/{id} - Meglévő costumer frissítése
DELETE /api/costumers/{id} - Costumer törlése

**3 Tasks:**

GET /api/tasks - Összes task lekérdezése
POST /api/tasks - Új task hozzáadása
PUT /api/tasks/{id} - Meglévő task frissítése
DELETE /api/tasks/{id} - Task törlése

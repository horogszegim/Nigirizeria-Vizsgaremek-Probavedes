# Nigirizéria Projekt – Dokumentáció

## Projekt célja

A Nigirizéria webalkalmazás célja egy pizzéria működésének modellezése teljes stack környezetben.  
A rendszer lehetővé teszi pizzák böngészését, kosárkezelést és időpont alapú asztalfoglalást.  
A weboldal saját REST API-ra épül, Laravel backenddel és Vue alapú frontenddel.  
Az alkalmazás adatbázis-alapú működést és dinamikus adatbetöltést valósít meg.

---

# Felhasználói dokumentáció

## 1. A rendszer elindítása

A projekt az iskola által biztosított full-stack környezetben futtatható.

### Indítás lépései

1. A virtuális gépeden klónozd le a repositoryt
2. Lépj be a leklónozott repoba. (`cd`)
2. Írd be a következő parancsot: `sh start.sh`
3. Várd meg, amíg az adatbázis és a konténerek elindulnak

Miután elindult, a böngésző címsorába ezt kell beírni:

`http://frontend.vm1.test/`

---

## 2. Étlap oldal működése

Az Étlap oldal megnyitásakor a rendszer automatikusan betölti az összes pizzát az adatbázisból.  
A pizzák kártyás elrendezésben jelennek meg.

Minden pizza tartalmazza:

- nevét
- leírását
- árát
- képét
- kategóriáit

Az adatok valós időben érkeznek a backend API-ból.

---

## 3. A felület használata

A navigációs menüből elérhető:

- Főoldal
- Étlap
- Asztalfoglalás

Az Étlap oldalon lehetőség van:

- pizzák kosárba helyezésére

A kosár ikon jelzi az aktuálisan kiválasztott tételek számát.

### Kosár használata

A kosárban lehetőség van:

- teljes összeg megtekintésére

---

## 4. Asztalfoglalás működése

Az Asztalfoglalás oldalon a felhasználó kiválaszthatja:

- a foglalás dátumát
- a kívánt kezdési és végzési időpontot 
- a vendégek számát
- valamint meg kell adnia teljes nevét

Sikeres foglalás esetén a rendszer visszajelzést ad.

---

# Fejlesztői dokumentáció

## 1. A projekt felépítése

A rendszer két fő részből áll.

### Backend

- Laravel keretrendszer
- MySQL adatbázis
- REST API

### Frontend

- Vue 3
- Pinia store állapotkezelés
- Vue Router
- Axios API kommunikáció

A backend biztosítja az adatbázis-kezelést és az API végpontokat, a frontend pedig dinamikusan jeleníti meg az adatokat.

---

## 2. Adatbázis struktúra

### pizzas tábla

- id (integer, primary key)
- name (string)
- description (string)
- price (integer)
- image_url (string)
- created_at (timestamp)
- updated_at (timestamp)

---

### categories tábla

- id (integer, primary key)
- name (string)
- created_at (timestamp)
- updated_at (timestamp)

---

### category_pizza pivot tábla

- pizza_id (foreign key)
- category_id (foreign key)

Kapcsolat: many-to-many.

---

### time_slots tábla

- id (integer, primary key)
- start_time (time)
- end_time (time)
- capacity (integer)
- created_at (timestamp)
- updated_at (timestamp)

---

### reservations tábla

- id (integer, primary key)
- time_slot_id (foreign key)
- date (date)
- guest_count (integer)
- created_at (timestamp)
- updated_at (timestamp)

Kapcsolat: Reservation → TimeSlot (many-to-one)

---

## 3. API végpontok

### BaseURL

`http://backend.vm1.test/api`

---

### 3.1 Pizza végpontok

pizza.index  
GET  
{{BaseURL}}/pizzas

pizza.show  
GET  
{{BaseURL}}/pizzas/{id}

---

### 3.2 Category végpontok

category.index  
GET  
{{BaseURL}}/categories

category.show  
GET  
{{BaseURL}}/categories/{id}

---

### 3.3 Reservation végpontok

reservation.index  
GET  
{{BaseURL}}/reservations  

reservation.show  
GET  
{{BaseURL}}/reservations/{id}  

reservation.store  
POST  
{{BaseURL}}/reservations  

reservation.update  
PUT  
{{BaseURL}}/reservations/{id}  

reservation.destroy  
DELETE  
{{BaseURL}}/reservations/{id}  

Foglalási logika:

A backend ellenőrzi az adott dátumra és idősávra eső foglalások számát.  
Ha a foglalások száma eléri a capacity értéket, a rendszer 400-as hibakóddal válaszol.  
Ha nem, a foglalás mentésre kerül.

---

### 3.4 Time Slot végpontok

timeslot.index  
GET  
{{BaseURL}}/time-slots

timeslot.show  
GET  
{{BaseURL}}/time-slots/{id}

### 3.5 Order végpontok

order.index  
GET  
{{BaseURL}}/orders  

order.show  
GET  
{{BaseURL}}/orders/{id}  

order.store  
POST  
{{BaseURL}}/orders  

order.update  
PUT  
{{BaseURL}}/orders/{id}  

order.destroy  
DELETE  
{{BaseURL}}/orders/{id}

### 3.6 Order Item végpontok

order-item.index  
GET  
{{BaseURL}}/order-items

order-item.show  
GET  
{{BaseURL}}/order-items/{id}

---

## 4. HTTP státuszkódok

- 200 OK – sikeres lekérés
- 201 Created – sikeres létrehozás
- 400 Bad Request – validációs hiba vagy kapacitás túllépés
- 404 Not Found – nem létező erőforrás
- 501 Not Implemented – nem implementált végpont
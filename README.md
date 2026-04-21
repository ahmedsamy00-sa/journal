---

# 📰 journal Laravel API

![Laravel](https://img.shields.io/badge/Laravel-API-red)
![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📌 Overview

A RESTful API built with **Laravel** for a **Journal Management System**.
The system allows managing news, categories, hashtags, videos, and site content.

Supports:

* 👤 Users Authentication
* 📰 Journal Management
* 🗂️ Categories
* 🔖 Hashtags
* 🎥 Videos
* 🌐 Site Info & Links
* 📩 Contact Messages

---

## ⚙️ Features

* 🔐 Authentication (Register / Login)
* 📰 Create & Manage News
* 🗂️ News Categories
* 🔖 Hashtags System (Many-to-Many)
* 🎥 Video Management
* 🌐 Dynamic Site Content (Info, Links)
* 📩 Contact Messages Handling

---

## 🛠️ Installation

```bash
git clone https://github.com/your-username/news-api
cd news-api
composer install
cp .env.example .env
php artisan key:generate
```

### ⚙️ Configure Database

```env
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=
```

```bash
php artisan migrate
php artisan serve
```

---

## 🔐 Authentication

Using **Laravel Sanctum**

```
Authorization: Bearer {token}
```

---

## 📡 API Endpoints

### 👤 Users

| Method | Endpoint            | Description   |
| ------ | ------------------- | ------------- |
| GET    | /api/users          | Get all users |
| POST   | /api/users/register | Register      |
| POST   | /api/users/login    | Login         |

---

### 🗂️ News Categories

| Method | Endpoint              | Description     |
| ------ | --------------------- | --------------- |
| GET    | /api/newsCategory     | All categories  |
| POST   | /api/newsCategory/add | Create category |

---

### 📰 News

| Method | Endpoint       | Description |
| ------ | -------------- | ----------- |
| GET    | /api/news      | All news    |
| GET    | /api/news/{id} | Single news |
| POST   | /api/news/add  | Create news |

---

### 🔖 Hashtags

| Method | Endpoint              | Description         |
| ------ | --------------------- | ------------------- |
| GET    | /api/hashtag          | All hashtags        |
| POST   | /api/hashtag/add/{id} | Add hashtag to news |

---

### 🎥 Videos

| Method | Endpoint       | Description |
| ------ | -------------- | ----------- |
| GET    | /api/video     | All videos  |
| POST   | /api/video/add | Add video   |

---

### 🌐 Site Info

| Method | Endpoint      | Description      |
| ------ | ------------- | ---------------- |
| GET    | /api/info     | Get site info    |
| POST   | /api/info/add | Update site info |

---

### 🔗 Site Links

| Method | Endpoint      | Description |
| ------ | ------------- | ----------- |
| GET    | /api/link     | All links   |
| POST   | /api/link/add | Add link    |

---

### 📩 Contact

| Method | Endpoint              | Description  |
| ------ | --------------------- | ------------ |
| GET    | /api/contact          | All messages |
| POST   | /api/contact/add/{id} | Send message |

---

📁 Project Structure
news-api/
│── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       ├── NewsController.php
│   │       ├── NewsCategoryController.php
│   │       ├── HashtagController.php
│   │       ├── VideoController.php
│   │       ├── SiteInfoController.php
│   │       ├── SiteLinkController.php
│   │       └── SiteContactController.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   ├── News.php
│   │   ├── NewsCategory.php
│   │   ├── Hashtag.php
│   │   ├── Video.php
│   │   ├── SiteInfo.php
│   │   ├── SiteLink.php
│   │   └── SiteContact.php
│
│── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2026_04_16_135850_create_personal_access_tokens_table.php
│   │   ├── 2026_04_19_070405_create_news_categories_table.php
│   │   ├── 2026_04_19_074650_create_news_table.php
│   │   ├── 2026_04_20_073113_create_videos_table.php
│   │   ├── 2026_04_20_074810_create_hashtags_table.php
│   │   ├── 2026_04_20_075636_create_news_hashtags_table.php
│   │   ├── 2026_04_20_092947_create_site_infos_table.php
│   │   ├── 2026_04_20_093147_create_site_links_table.php
│   │   └── 2026_04_20_093203_create_site_contacts_table.php
│   │
│   └── seeders/
│
│── routes/
│   └── api.php
│
│── config/
│── storage/
│── public/
│── .env
│── composer.json
│── README.md

---

## 🧠 Database Relations (Important)

* News ↔ Hashtags → **Many-to-Many**
* News → Category → **Many-to-One**
* Site Info → Links / Contacts → **One-to-Many**

---

## 🧪 Testing

You can test the API using:

* Postman
* Thunder Client

👉 Add Authorization header:

```
Bearer {token}
```

---

## 🚀 Future Improvements

* ✅ Add Admin Dashboard
* ✅ Pagination
* ✅ Search & Filtering
* ✅ Comments System
* ✅ Image Upload for News

---

## 📜 License
This project is licensed under the MIT License.

---


## 👨‍💻 Author

**Ahmed Samy**

---
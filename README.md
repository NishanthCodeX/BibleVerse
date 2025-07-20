# BibleVerse

**BibleVerse** is a Laravel-based Bible web app to read, search, and view Bible verses in **Tamil and English**.  
It’s designed for use by **individuals and churches**, with features like AJAX-based navigation, clean UI, and verse projection view.

![screenshot](storage/screenshots/homepage.png)

---

## 🌟 Features

- 📖 View Bible verses by selecting Book → Chapter → Verse (AJAX-powered)
- 🔍 Advanced Search and Filter
- 🌐 Supports both Tamil and English
- 🎬 Clean single-verse display for church projection
- 📱 Mobile-friendly responsive design

---

## 🚧 Upcoming Features

- 🔊 Audio Bible — play audio when clicking a verse
- 🎵 Christian Songs Lyrics page
- 🌍 Multilingual support (Hindi, Malayalam, Kannada, Telugu, etc.)
- 👥 User accounts & bookmarking (future)

---

## 💻 Live Demo / Hosting Guide

🔗 **Live Demo:** [https://bible.yaabitech.com](https://bible.yaabitech.com)

📦 **Hosting Guide:**
- 🖥️ Local PC (XAMPP/WAMP): Coming soon
- 🌐 Shared Hosting: Coming soon
- ☁️ AWS EC2: Coming soon

---

## 🚀 Installation

```bash
git clone https://github.com/NishanthCodeX/BibleVerse.git
cd BibleVerse
composer install
cp .env.example .env
php artisan key:generate

# Edit the .env file:
# By default, this project uses SQLite for easy setup.
# To use MySQL instead, update the DB_CONNECTION and related DB_* values in .env

php artisan migrate --seed
php artisan serve  # Or run it via XAMPP/WAMP's Apache server with the correct document root

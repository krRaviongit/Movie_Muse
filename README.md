
# 🎬 Movie Muse

Movie Muse is a simple and user-friendly movie review system built using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**, hosted locally using **XAMPP**. It allows users to register, log in, view movie reviews, and submit their own reviews with emoji-based ratings.

---

## 🎬 UI Preview

Here’s a glimpse of the **Movie Muse** homepage:

![Movie Muse UI 2](https://github.com/user-attachments/assets/1998b892-7745-4677-af5f-b64d759f0cd7)
(https://github.com/user-attachments/assets/75c8d949-5a58-42be-b50c-0aba30b6cded)
---

## 📌 Features

- 🧑‍💻 User Registration and Login
- ✍️ Submit Reviews (Only After Login)
- 😊 Emoji-Based Rating System
- 🗂️ MySQL Database to Store Users and Reviews
- ✅ Success Message After Submitting Review (No Page Redirect)
- 🖼️ Professionally Styled Homepage and Review Section
- 🔒 Basic Session Management for Authentication

---

## 🛠️ Tech Stack Used

| Frontend         | Backend     | Database | Server |
|------------------|-------------|----------|--------|
| HTML, CSS, JS    | PHP         | MySQL    | XAMPP  |

---

## 📁 Folder Structure

```
Movie_Muse/
│
├── index.html
├── register.html
├── login.html
├── review.html
├── style.css
├── script.js
├── submit_review.php
├── login.php
├── register.php
├── logout.php
└── db_config.php
```

---

## 🔐 Database Structure (phpMyAdmin)

**Database Name:** `themoviess_review`

**Tables:**

1. `users`
   - `id` (Primary Key)
   - `username`
   - `email`
   - `password`

2. `reviews`
   - `id` (Primary Key)
   - `username`
   - `movie_name`
   - `rating`
   - `comment`

---


## 💡 Made with ❤️ by [Kumar Ravi](https://github.com/krRaviongit)

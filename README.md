<div align="center">
    <a href="https://divulgazap.alwaysdata.net" target="_blank">
        <img src="https://i.ibb.co/TMvwjByB/cover01.png" width="100%" />
    </a>
</div>

## 📌 About

**DivulgaZAP** is a simple web application that allows users to:

- Discover WhatsApp groups by category  
- Share their own WhatsApp groups  

## 🌐 Tech Stack:

- Nginx
- MySQL
- Docker
- Laravel
- JavaScript
- Cloudflare Turnstile

## 🎓 Purpose

This project was built as a **learning project** to explore:

- Laravel architecture
- MVC design patterns
- Dockerized development environments
- Web Scraping
- Cloudflare Turnstile
- Internationalization (i18n)

---

## 🖼️ Screenshots

<div align="center">
    <img src="https://i.ibb.co/7tcNFB28/gif5.gif" width="100%" />
</div>

---

## 📦 Installation and Setup

### ⚙️ Requirements

Before starting, make sure you have installed:

1. [Git](https://git-scm.com/)
2. [Docker](https://www.docker.com/)

## 🚀 Getting Started

Follow the steps below to run the project locally.

### 1. Clone the repository

```bash
git clone https://github.com/hnqca/divulgazap-laravel
cd divulgazap-laravel
```

### 2. Configure environment variables

Duplicate the **`.env.example`** file and rename it to **`.env`**.

### 3. Build and start the containers

```bash
docker compose up -d --build
```

### 4. Run composer setup

```bash
docker exec -it divulgazap-laravel composer setup
```

### 5. Access the application

Open your browser and go to: **`http://localhost:8000`**

---

## 🔒 Cloudflare Turnstile (Required)

This application uses **[Cloudflare Turnstile](https://www.cloudflare.com/application-services/products/turnstile/)** to mitigate automated bot submissions when users submit or join WhatsApp groups.

> [!IMPORTANT]  
> Without valid keys, form submissions will not work.

Obtain your keys from Cloudflare and configure them in your **`.env`** file:

```bash
CLOUDFLARE_TURNSTILE_SITE_KEY=
CLOUDFLARE_TURNSTILE_SECRET_KEY=
```

## ⏱️ Scheduled Tasks

The application uses the **Laravel Scheduler** to periodically check whether shared WhatsApp group invitation links (**older than 24 hours**) are still valid.

If a link is no longer valid, the group is automatically hidden.

## 📄 License

This project is **open-source** and available under the MIT License.

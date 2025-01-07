# Task Manager

Bu proje, Laravel ve Inertia.js kullanılarak geliştirilmiş bir görev yönetim uygulamasıdır. React bileşenleri ve TailwindCSS ile modern bir kullanıcı arayüzüne sahiptir.

## Özellikler

-   Görev oluşturma, düzenleme ve silme
-   Kullanıcı yönetimi (ekleme, düzenleme, silme)
-   Görevleri kullanıcılara atama
-   Modern ve duyarlı arayüz tasarımı
-   Flash mesajları ile işlem bildirimleri

## Gereksinimler

-   PHP >= 8.1
-   Node.js >= 16
-   MySQL veya MariaDB
-   Composer

## Kurulum

1. Projeyi klonlayın:

```bash
git clone <proje-url>
cd task-manager
```

2. Composer bağımlılıklarını yükleyin:

```bash
composer install
```

3. NPM bağımlılıklarını yükleyin:

```bash
npm install
```

4. `.env` dosyasını oluşturun:

```bash
cp .env.example .env
```

5. Uygulama anahtarını oluşturun:

```bash
php artisan key:generate
```

6. `.env` dosyasında veritabanı bağlantısını yapılandırın:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

7. Veritabanı tablolarını oluşturun:

```bash
php artisan migrate
```

## Geliştirme

1. Vite geliştirme sunucusunu başlatın:

```bash
npm run dev
```

2. Laravel sunucusunu başlatın:

```bash
php artisan serve
```

Uygulama http://localhost:8000 adresinde çalışacaktır.

## Kullanılan Teknolojiler

-   [Laravel](https://laravel.com)
-   [Inertia.js](https://inertiajs.com)
-   [React](https://reactjs.org)
-   [TailwindCSS](https://tailwindcss.com)
-   [MySQL](https://www.mysql.com)

## Lisans

Bu proje MIT lisansı altında lisanslanmıştır.

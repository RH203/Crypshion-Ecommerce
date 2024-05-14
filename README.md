# Rules Contributor
## File Creation
- Membuat file view di dalam folder livewire dengan menjalankan perintah ini `php artisan make:livewire nama_folde.nama_file`
- Gunakan layout `app` di dalam class livewire yang terletak di direktori `app/Livewire/nama_folder/nama_file.php`
- Tambahkan Title di dalam class livewire yang terletak di direktori  `app/Livewire/nama_folder/nama_file.php`

## Writing Rules
- Nama route tidak boleh di singkat gunakan tanda `-` ketika ada spasi : `contoh : /home-page`
- Segala sesuatu yang berhubungan dengan gambar simpan di dalam folder `public/img/`
- Jika ingin mengcustom style pada css silahkan simpan di dalam `function & directive` tailwind atau `tailwind.config.js`
- Penulisan code di dalan viewnya cukup contentnya saja tidak perlu menulis header html

## Component Rules
### Container
Untuk membuat container silahkan gunakan width `w-10/12` dengan position center
```html
<div class="w-10/12 mx-auto">
  ...
</div>
```

### Font 
Menggunakan font `poppins`
```html
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
```

Or

```css
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
```


Usage

```css
* {
  font-family : 'Poppins'
}

```

### Breakpoint 





## Warning
- Jangan pernah menghapus folder atau file apapun yg sudah ada atau bawaan dari laravel
- 


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

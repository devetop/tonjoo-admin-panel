import { router } from '@inertiajs/react';
import Swal from 'sweetalert2';

export function formatTanggalIndo(tanggalInput) {
    if (tanggalInput === null || tanggalInput === undefined) {
        return null;
    }

    let tanggal;

    // Cek apakah input adalah angka (number)
    if (typeof tanggalInput === 'number') {
        // Jika panjang angka lebih dari 10 (asumsi milidetik), gunakan langsung
        // Jika tidak, kalikan dengan 1000 (konversi dari detik ke milidetik)
        tanggal = new Date(tanggalInput > 9999999999 ? tanggalInput : tanggalInput * 1000);
    } else {
        tanggal = new Date(tanggalInput);
    }

    let opsi = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit', 
        timeZone: 'Asia/Jakarta',
        hour12: false // Format 24 jam
    };
    return new Intl.DateTimeFormat('id-ID', opsi).format(tanggal);
}

export function confirmAndNavigate(message, url) {
    Swal.fire({
        title: 'Warning!',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        // confirmButtonText: 'Ya, lakukan!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.get(url)
        }
    });
}

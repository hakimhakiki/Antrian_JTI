# Antrian JTI

Created with CodeSandbox.

## Collaborator

- Makhi Hakim
- Khoirul Usamah

## Deskripsi

Antrian JTI ini dibuat untuk memudahkan **antrian** dari sekian banyak mahasiswa **Jurusan Teknologi Informasi.**

## Alur Kerja

Alur kerja dari sistem Antrian JTI:

- Untuk bagian admin prodi

```mermaid
graph TD
  A(Mulai) --> B[Admin Prodi melakukan login]
  B --> C[Admin mengaktifkan slider aktif kerja]
  C --> D[Admin menunggu input mahasiswa]
  D --> E[Mahasiswa dipanggil sesuai antrian]
  E --> F(Selesai)
```

- Untuk bagian mahasiswa

```mermaid
graph TD
  A(Mulai)  --> B{Apakah admin aktif?}
  B --> |TIDAK| C[/Admin tidak aktif/]
  B --> |YA| D[Mahasiswa mengisi antrian]
  D --> E[Mahasiswa mengisi form]
  E --> F[Mahasiswa menunggu antrian]
  F --> G[Mahasiswa dipanggil]
  G --> H(Selesai)
  C --> H
```

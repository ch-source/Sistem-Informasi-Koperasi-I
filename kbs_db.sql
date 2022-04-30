-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2021 pada 16.09
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbs_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `tgl_pengajuan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlpn` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_tbngan_awal` varchar(50) NOT NULL,
  `status_simpanan_awal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nama_anggota`, `no_identitas`, `jk`, `tgl_lahir`, `tgl_pengajuan`, `alamat`, `no_tlpn`, `status`, `pekerjaan`, `status_tbngan_awal`, `status_simpanan_awal`) VALUES
('ANG001', 'Ni Kadek Santi', '0088', 'Perempuan', '1993-11-08', '2020-01-19', 'Br. Cempaka, Desa Pikat', '082339368112', 'Aktif', 'Wiraswasta', 'oke', ''),
('ANG002', 'Ni Wayan Sarti', '5566', 'Perempuan', '1973-01-13', '2020-02-08', 'Br. Cempaka, Desa Pikat', '082339368113', 'Aktif', 'Wiraswasta', '', ''),
('ANG003', 'Kosmas Hatu', '3434534343', 'Laki-laki', '2021-07-11', '2021-07-12', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', ''),
('ANG004', 'Chris', '3434534343', 'Laki-laki', '2021-07-11', '2021-07-12', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', ''),
('ANG005', 'viki', '3434534343', 'Laki-laki', '2021-07-12', '2021-07-13', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota_nasabah`
--

CREATE TABLE `tbl_anggota_nasabah` (
  `nomor` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tgl_pengajuan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_anggota` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_anggota_nasabah`
--

INSERT INTO `tbl_anggota_nasabah` (`nomor`, `nama`, `no_identitas`, `tgl_lahir`, `jk`, `tgl_pengajuan`, `alamat`, `no_telepon`, `status`, `pekerjaan`, `status_anggota`, `level`) VALUES
('ANG001', 'Ni Kadek Santi', '0088', '1993-11-08', 'Perempuan', '2020-01-19', 'Br. Cempaka, Desa Pikat', '082339368112', 'Aktif', 'Wiraswasta', '', 'Anggota'),
('ANG002', 'Ni Wayan Sarti', '5566', '1973-01-13', 'Perempuan', '2020-02-08', 'Br. Cempaka, Desa Pikat', '082339368113', 'Aktif', 'Wiraswasta', '', 'Anggota'),
('ANG003', 'Kosmas Hatu', '3434534343', '2021-07-11', 'Laki-laki', '2021-07-12', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', 'Anggota'),
('ANG004', 'Chris', '3434534343', '2021-07-11', 'Laki-laki', '2021-07-12', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', 'Anggota'),
('ANG005', 'viki', '3434534343', '2021-07-12', 'Laki-laki', '2021-07-13', 'jljl', '08978787', 'Aktif', 'Wiraswasta', '', 'Anggota'),
('N001', 'Yustus Egor', '3434534343', '2021-07-10', 'Laki-laki', '2021-07-10', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '', 'Nasabah'),
('N002', 'viki', '3434534343', '2021-07-12', 'Laki-laki', '2021-07-13', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '', 'Nasabah'),
('N003', 'Pimpinan', '3434534343', '2021-07-13', 'Perempuan', '2021-07-22', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '', 'Nasabah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bunga`
--

CREATE TABLE `tbl_bunga` (
  `id_bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga_m` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga_t` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bunga_x`
--

CREATE TABLE `tbl_bunga_x` (
  `id_bunga_x` varchar(50) NOT NULL,
  `jenis_bunga` varchar(50) NOT NULL,
  `bunga_a` varchar(50) NOT NULL,
  `ket_bunga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bunga_x`
--

INSERT INTO `tbl_bunga_x` (`id_bunga_x`, `jenis_bunga`, `bunga_a`, `ket_bunga`) VALUES
('BUN001', 'BS', '0.4', 'Bunga Simpanan'),
('BUN002', 'BP', '1', 'Bunga Menurun'),
('BUN003', 'BP', '2', 'Bunga Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jaminan`
--

CREATE TABLE `tbl_jaminan` (
  `jenis_jaminan` varchar(50) NOT NULL,
  `min` varchar(50) NOT NULL,
  `max` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jaminan`
--

INSERT INTO `tbl_jaminan` (`jenis_jaminan`, `min`, `max`) VALUES
('BPKB Mobil', '1000000', '20000000'),
('BPKB Motor', '1000000', '10000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nasabah`
--

CREATE TABLE `tbl_nasabah` (
  `id_nasabah` varchar(50) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tgl_pengajuan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlpn` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_tbngan_awal` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_nasabah`
--

INSERT INTO `tbl_nasabah` (`id_nasabah`, `nama_nasabah`, `no_identitas`, `tgl_lahir`, `jk`, `tgl_pengajuan`, `alamat`, `no_tlpn`, `status`, `pekerjaan`, `status_anggota`, `status_tbngan_awal`) VALUES
('N001', 'Yustus Egor', '3434534343', '2021-07-10', 'Laki-laki', '2021-07-10', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '', ''),
('N003', 'Pimpinan', '3434534343', '2021-07-13', 'Perempuan', '2021-07-22', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '', ''),
('N004', 'viki', '3434534343', '2021-07-12', 'Laki-laki', '2021-07-13', 'jljl', '08978787', 'Belum Menikah', 'Wiraswasta', '2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran_pinjaman`
--

CREATE TABLE `tbl_pembayaran_pinjaman` (
  `id_pembayaran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_pinjaman` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_pembayaran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah_pinjaman` decimal(50,0) NOT NULL,
  `jenis_bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jangka_waktu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_k` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sisa_angsuran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_pokok` decimal(22,2) NOT NULL,
  `angsuran_bunga` decimal(22,2) NOT NULL,
  `total_angsuran` decimal(22,2) NOT NULL,
  `total_tunggakan` decimal(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran_pinjaman_nasabah`
--

CREATE TABLE `tbl_pembayaran_pinjaman_nasabah` (
  `id_pembayaran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_pinjaman` varchar(50) NOT NULL,
  `id_nasabah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_pembayaran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah_pinjaman` decimal(22,2) NOT NULL,
  `jenis_bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jangka_waktu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_k` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sisa_angsuran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_pokok` decimal(22,2) NOT NULL,
  `angsuran_bunga` decimal(22,2) NOT NULL,
  `total_angsuran` decimal(22,2) NOT NULL,
  `total_tunggakan` decimal(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penarikan`
--

CREATE TABLE `tbl_penarikan` (
  `id_penarikan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_penarikan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_penarikan` decimal(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penarikan`
--

INSERT INTO `tbl_penarikan` (`id_penarikan`, `id_anggota`, `periode`, `tahun`, `tgl_penarikan`, `jml_penarikan`) VALUES
('PNK001', 'ANG001', '', '', '2021-02-09', '50000.00'),
('PNK002', 'N001', '', '', '2021-02-08', '500000.00'),
('PNK003', 'ANG001', '', '', '2021-02-19', '50000.00'),
('PNK004', 'ANG001', '', '', '2021-03-01', '50000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penarikan_nasabah`
--

CREATE TABLE `tbl_penarikan_nasabah` (
  `id_penarikan_n` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_nasabah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode_p` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun_p` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_penarikan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_penarikan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjaman_anggota`
--

CREATE TABLE `tbl_pinjaman_anggota` (
  `id_pinjaman` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_pinjaman` varchar(50) NOT NULL,
  `no_telepon` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_peminjam` varchar(50) NOT NULL,
  `jenis_jaminan` varchar(50) NOT NULL,
  `jenis_bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jangka_waktu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_k` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `status_pinjaman` varchar(50) NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pinjaman_anggota`
--

INSERT INTO `tbl_pinjaman_anggota` (`id_pinjaman`, `id_anggota`, `periode`, `tahun`, `tgl_pinjaman`, `no_telepon`, `alamat`, `pekerjaan`, `status_peminjam`, `jenis_jaminan`, `jenis_bunga`, `bunga`, `jangka_waktu`, `angsuran_k`, `jumlah_pinjaman`, `status_pinjaman`, `status`) VALUES
('PJM001', 'ANG001', 'July', '2021', '2021-07-12', '082339368112', 'Br. Cempaka, Desa Pikat', 'Wiraswasta', 'Sudah Menikah', 'BPKB Motor', 'BUN003', '2', '6', '1', 6000000, 'Sudah Dikonfirmasi', ''),
('PJM002', 'ANG002', 'July', '2021', '2021-07-12', '082339368113', 'Br. Cempaka, Desa Pikat', 'Wiraswasta', 'Sudah Menikah', 'BPKB Mobil', 'BUN003', '2', '6', '1', 6000000, 'Sudah Dikonfirmasi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjaman_nasabah`
--

CREATE TABLE `tbl_pinjaman_nasabah` (
  `id_pinjaman` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_nasabah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_pinjam` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_telepon` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_peminjam` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jenis_jaminan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jenis_bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bunga` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jangka_waktu` varchar(50) CHARACTER SET latin1 NOT NULL,
  `angsuran_k` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jumlah_pinjaman` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status_pinjaman` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pinjaman_nasabah`
--

INSERT INTO `tbl_pinjaman_nasabah` (`id_pinjaman`, `id_nasabah`, `periode`, `tahun`, `tgl_pinjam`, `no_telepon`, `alamat`, `pekerjaan`, `status_peminjam`, `jenis_jaminan`, `jenis_bunga`, `bunga`, `jangka_waktu`, `angsuran_k`, `jumlah_pinjaman`, `status_pinjaman`, `status`) VALUES
('PJM001', 'N003', 'July', '2021', '2021-07-12', '08978787', 'jljl', 'Wiraswasta', 'Sudah Menikah', 'BPKB Mobil', 'BUN003', '2', '10', '1', '11000000', '', ''),
('PJM002', 'N005', 'July', '2021', '2021-07-12', '08978787', 'jljl', 'Wiraswasta', 'Belum Menikah', 'BPKB Motor', 'BUN003', '2', '6', '1', '6000000', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap_simpanan_a`
--

CREATE TABLE `tbl_rekap_simpanan_a` (
  `id_rs` int(11) NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ttl_simpanan` decimal(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekap_simpanan_a`
--

INSERT INTO `tbl_rekap_simpanan_a` (`id_rs`, `id_anggota`, `periode`, `tahun`, `ttl_simpanan`) VALUES
(114, 'ANG001', 'July', '2021', '200000.00'),
(115, 'ANG001', 'July', '2021', '200000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap_tabungan_anggota`
--

CREATE TABLE `tbl_rekap_tabungan_anggota` (
  `id_ra` int(11) NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun_a` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_bunga` int(11) NOT NULL,
  `ttl_tabungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekap_tabungan_anggota`
--

INSERT INTO `tbl_rekap_tabungan_anggota` (`id_ra`, `id_anggota`, `tahun_a`, `jml_bunga`, `ttl_tabungan`) VALUES
(112, 'ANG001', '2021', 400, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekap_tabungan_nasabah`
--

CREATE TABLE `tbl_rekap_tabungan_nasabah` (
  `id_rn` int(11) NOT NULL,
  `id_nasabah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_bunga` int(11) NOT NULL,
  `ttl_tabungan_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_simpanan_a`
--

CREATE TABLE `tbl_simpanan_a` (
  `id_simpanan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_setor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `simpanan_wajib` decimal(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_simpanan_a`
--

INSERT INTO `tbl_simpanan_a` (`id_simpanan`, `id_anggota`, `periode`, `tahun`, `tgl_setor`, `simpanan_wajib`) VALUES
('SMP001', 'ANG001', 'July', '2021', '2021-07-12', '100000.00'),
('SMP002', 'ANG001', 'July', '2021', '2021-07-12', '100000.00'),
('SMP003', 'ANG001', 'July', '2021', '2021-07-12', '100000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tabungan`
--

CREATE TABLE `tbl_tabungan` (
  `id_tabungan` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tgl_tabung` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `saldo_awal` varchar(50) NOT NULL,
  `bunga_awal` varchar(50) NOT NULL,
  `jumlah_tabungan` varchar(50) NOT NULL,
  `bunga_tabungan` varchar(50) NOT NULL,
  `jumlah_bunga` varchar(50) NOT NULL,
  `total_tabungan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tabungan`
--

INSERT INTO `tbl_tabungan` (`id_tabungan`, `nomor`, `periode`, `tahun`, `tgl_tabung`, `nama`, `saldo_awal`, `bunga_awal`, `jumlah_tabungan`, `bunga_tabungan`, `jumlah_bunga`, `total_tabungan`) VALUES
('TBN001', 'ANG001', 'July', '2021', '2021-07-12', '', '', '', '100000', '0.4', '400', '100400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tabungan_anggota`
--

CREATE TABLE `tbl_tabungan_anggota` (
  `id_tabungan_a` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_anggota` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode_a` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun_a` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tanggal_setor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_penyetor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `bunga_awal` int(11) NOT NULL,
  `jumlah_tabungan` int(11) NOT NULL,
  `bunga_ta` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_bunga` int(11) NOT NULL,
  `total_tabungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tabungan_nasabah`
--

CREATE TABLE `tbl_tabungan_nasabah` (
  `id_tabungan_n` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_nasabah` varchar(50) CHARACTER SET latin1 NOT NULL,
  `periode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tgl_setoran` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama_penyetor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `bunga_awal` int(11) NOT NULL,
  `jml_tabungan` int(11) NOT NULL,
  `bunga_tn` varchar(50) CHARACTER SET latin1 NOT NULL,
  `jml_bunga` int(11) NOT NULL,
  `total_tabungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `level`, `username`, `password`) VALUES
('USR001', 'Risna', 'Admin', '12345', '12345'),
('USR002', 'Santi', 'Ketua Koperasi', 'santi', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tbl_anggota_nasabah`
--
ALTER TABLE `tbl_anggota_nasabah`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `tbl_bunga`
--
ALTER TABLE `tbl_bunga`
  ADD PRIMARY KEY (`id_bunga`);

--
-- Indeks untuk tabel `tbl_jaminan`
--
ALTER TABLE `tbl_jaminan`
  ADD PRIMARY KEY (`jenis_jaminan`);

--
-- Indeks untuk tabel `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indeks untuk tabel `tbl_pembayaran_pinjaman`
--
ALTER TABLE `tbl_pembayaran_pinjaman`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_pembayaran_pinjaman_nasabah`
--
ALTER TABLE `tbl_pembayaran_pinjaman_nasabah`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_penarikan`
--
ALTER TABLE `tbl_penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indeks untuk tabel `tbl_penarikan_nasabah`
--
ALTER TABLE `tbl_penarikan_nasabah`
  ADD PRIMARY KEY (`id_penarikan_n`);

--
-- Indeks untuk tabel `tbl_pinjaman_anggota`
--
ALTER TABLE `tbl_pinjaman_anggota`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `tbl_pinjaman_nasabah`
--
ALTER TABLE `tbl_pinjaman_nasabah`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `tbl_rekap_simpanan_a`
--
ALTER TABLE `tbl_rekap_simpanan_a`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indeks untuk tabel `tbl_rekap_tabungan_anggota`
--
ALTER TABLE `tbl_rekap_tabungan_anggota`
  ADD PRIMARY KEY (`id_ra`);

--
-- Indeks untuk tabel `tbl_rekap_tabungan_nasabah`
--
ALTER TABLE `tbl_rekap_tabungan_nasabah`
  ADD PRIMARY KEY (`id_rn`);

--
-- Indeks untuk tabel `tbl_simpanan_a`
--
ALTER TABLE `tbl_simpanan_a`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indeks untuk tabel `tbl_tabungan`
--
ALTER TABLE `tbl_tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `tbl_tabungan_anggota`
--
ALTER TABLE `tbl_tabungan_anggota`
  ADD PRIMARY KEY (`id_tabungan_a`);

--
-- Indeks untuk tabel `tbl_tabungan_nasabah`
--
ALTER TABLE `tbl_tabungan_nasabah`
  ADD PRIMARY KEY (`id_tabungan_n`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap_simpanan_a`
--
ALTER TABLE `tbl_rekap_simpanan_a`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap_tabungan_anggota`
--
ALTER TABLE `tbl_rekap_tabungan_anggota`
  MODIFY `id_ra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekap_tabungan_nasabah`
--
ALTER TABLE `tbl_rekap_tabungan_nasabah`
  MODIFY `id_rn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

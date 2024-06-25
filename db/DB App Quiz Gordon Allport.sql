CREATE TABLE `tb_user` (
  `id_user` int PRIMARY KEY AUTO_INCREMENT,
  `name_user` varchar(35),
  `asal_user` text,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

CREATE TABLE `tb_admin` (
  `id_admin` int PRIMARY KEY AUTO_INCREMENT,
  `username_admin` varchar(20),
  `password_admin` text,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

CREATE TABLE `tb_soal` (
  `id_soal` int PRIMARY KEY AUTO_INCREMENT,
  `text_soal` text,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

CREATE TABLE `tb_pilihan` (
  `id_pilihan` int PRIMARY KEY AUTO_INCREMENT,
  `id_soal` int,
  `name_pilihan` varchar(10),
  `text_pilihan` text,
  `is_correct` int,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int PRIMARY KEY AUTO_INCREMENT,
  `id_user` int,
  `id_soal` int,
  `id_pilihan` int,
  `point_jawaban` double,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

CREATE TABLE `tb_nilai` (
  `id_nilai` int PRIMARY KEY AUTO_INCREMENT,
  `id_user` int,
  `point_nilai` double,
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime
);

ALTER TABLE `tb_pilihan` ADD FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`);

ALTER TABLE `tb_jawaban` ADD FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

ALTER TABLE `tb_jawaban` ADD FOREIGN KEY (`id_soal`) REFERENCES `tb_soal` (`id_soal`);

ALTER TABLE `tb_jawaban` ADD FOREIGN KEY (`id_pilihan`) REFERENCES `tb_pilihan` (`id_pilihan`);

ALTER TABLE `tb_nilai` ADD FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

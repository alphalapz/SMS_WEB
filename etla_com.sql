-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 23:53:04
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `etla_com`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `as_cur`
--

CREATE TABLE `as_cur` (
  `id_cur` smallint(5) UNSIGNED NOT NULL,
  `src_cur_id` smallint(5) UNSIGNED NOT NULL,
  `des_cur_id` smallint(5) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` char(50) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `as_cur`
--

INSERT INTO `as_cur` (`id_cur`, `src_cur_id`, `des_cur_id`, `code`, `name`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, 2, 1, 'MXN', 'PESO MEXICANO', 1, 0, 1, '2018-01-05 12:55:19'),
(2, 1, 2, 'USD', 'US DOLLAR', 2, 0, 1, '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `as_pay_met`
--

CREATE TABLE `as_pay_met` (
  `id_pay_met` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `as_pay_met`
--

INSERT INTO `as_pay_met` (`id_pay_met`, `code`, `name`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, '', '(N/A)', 1, 0, 1, '2018-01-05 12:55:21'),
(11, '', 'EFECTIVO', 11, 0, 1, '2018-01-05 12:55:21'),
(12, '', 'CHEQUE NOMINATIVO', 12, 0, 1, '2018-01-05 12:55:21'),
(13, '', 'TRANSFERENCIA ELECTRÓNICA DE FONDOS', 13, 0, 1, '2018-01-05 12:55:21'),
(21, '', 'TARJETA DE DÉBITO', 21, 0, 1, '2018-01-05 12:55:21'),
(22, '', 'TARJETA DE CRÉDITO', 22, 0, 1, '2018-01-05 12:55:21'),
(31, '', 'MONEDERO ELECTRÓNICO', 31, 0, 1, '2018-01-05 12:55:21'),
(32, '', 'DINERO ELECTRÓNICO', 32, 0, 1, '2018-01-05 12:55:21'),
(41, '', 'VALES DE DESPENSA', 41, 0, 1, '2018-01-05 12:55:21'),
(98, '', 'NO IDENTIFICADO', 98, 1, 1, '2018-01-05 12:55:21'),
(99, '', 'OTROS', 99, 0, 1, '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `as_uom`
--

CREATE TABLE `as_uom` (
  `id_uom` smallint(5) UNSIGNED NOT NULL,
  `src_uom_id` char(25) NOT NULL,
  `des_uom_id` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  `type` char(1) NOT NULL,
  `unit` char(10) NOT NULL,
  `base_unit` char(10) NOT NULL,
  `conv_fact` decimal(23,8) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `as_uom`
--

INSERT INTO `as_uom` (`id_uom`, `src_uom_id`, `des_uom_id`, `code`, `name`, `type`, `unit`, `base_unit`, `conv_fact`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, 'MSM', 108, 'MSM', 'THOUSAND SQUARE METERS', 'A', '1k·m²', 'm²', '1000.00000000', 1, 0, 1, '2018-01-05 12:55:19'),
(2, 'MSF', 109, 'MSF', 'THOUSAND SQUARE FEET', 'A', '1k·ft²', 'm²', '92.90304000', 2, 0, 1, '2018-01-05 12:55:19'),
(3, 'SQM', 24, 'SQM', 'SQUARE METER', 'A', 'm²', 'm²', '1.00000000', 3, 0, 1, '2018-01-05 12:55:19'),
(4, 'SQF', 31, 'SQF', 'SQUARE FOOT', 'A', 'ft²', 'm²', '0.09290304', 4, 0, 1, '2018-01-05 12:55:19'),
(5, 'PC', 3, 'PC', 'PIECE', 'U', 'pza', 'unit', '1.00000000', 5, 0, 1, '2018-01-05 12:55:19'),
(6, 'M', 6, 'M', 'THOUSAND', 'U', '1k', 'unit', '1000.00000000', 6, 0, 1, '2018-01-05 12:55:19'),
(7, 'KG', 59, 'KG', 'KILOGRAM', 'W', 'kg', 'kg', '1.00000000', 7, 0, 1, '2018-01-05 12:55:19'),
(8, 'TON', 58, 'TON', 'TON', 'W', 'ton', 'kg', '1000.00000000', 8, 0, 1, '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `au_cus`
--

CREATE TABLE `au_cus` (
  `id_cus` int(10) UNSIGNED NOT NULL,
  `src_cus_id` char(25) NOT NULL,
  `des_cus_id` int(10) UNSIGNED NOT NULL,
  `des_cus_bra_id` int(10) UNSIGNED NOT NULL,
  `code` char(25) NOT NULL,
  `name` char(100) NOT NULL,
  `name_s` char(25) NOT NULL,
  `tax_id` char(25) NOT NULL,
  `str` char(100) NOT NULL,
  `num_ext` char(50) NOT NULL,
  `num_int` char(50) NOT NULL,
  `nei` char(100) NOT NULL,
  `ref` char(100) NOT NULL,
  `loc` char(100) NOT NULL,
  `cou` char(100) NOT NULL,
  `src_sta_fk` char(25) NOT NULL,
  `sta` char(100) NOT NULL,
  `src_cty_fk` char(25) NOT NULL,
  `cty` char(100) NOT NULL,
  `zip` char(10) NOT NULL,
  `pho` char(50) NOT NULL,
  `fax` char(50) NOT NULL,
  `pay_acc` char(25) NOT NULL,
  `cdt_day` smallint(5) UNSIGNED NOT NULL,
  `cdt_lim` decimal(17,2) NOT NULL,
  `cdt_sta_code` char(10) NOT NULL,
  `pay_ter_code` char(10) NOT NULL,
  `src_cus_cur_fk_n` smallint(5) UNSIGNED DEFAULT NULL,
  `src_cus_uom_fk_n` char(25) DEFAULT NULL,
  `src_cus_sal_agt_fk_n` int(10) UNSIGNED DEFAULT NULL,
  `src_req_cur_fk_n` smallint(5) UNSIGNED DEFAULT NULL,
  `src_req_uom_fk_n` char(25) DEFAULT NULL,
  `des_cfdi_pay_way` char(2) NOT NULL,
  `des_cfdi_cfd_use` char(3) NOT NULL,
  `fst_etl_ins` datetime NOT NULL,
  `lst_etl_upd` datetime NOT NULL,
  `b_etl_ign` tinyint(1) NOT NULL,
  `b_act` tinyint(1) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_src_cus_cur_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_cus_uom_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_cus_sal_agt_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_req_cur_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_req_uom_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_des_req_pay_met_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_lst_etl_log` int(10) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `au_cus`
--

INSERT INTO `au_cus` (`id_cus`, `src_cus_id`, `des_cus_id`, `des_cus_bra_id`, `code`, `name`, `name_s`, `tax_id`, `str`, `num_ext`, `num_int`, `nei`, `ref`, `loc`, `cou`, `src_sta_fk`, `sta`, `src_cty_fk`, `cty`, `zip`, `pho`, `fax`, `pay_acc`, `cdt_day`, `cdt_lim`, `cdt_sta_code`, `pay_ter_code`, `src_cus_cur_fk_n`, `src_cus_uom_fk_n`, `src_cus_sal_agt_fk_n`, `src_req_cur_fk_n`, `src_req_uom_fk_n`, `des_cfdi_pay_way`, `des_cfdi_cfd_use`, `fst_etl_ins`, `lst_etl_upd`, `b_etl_ign`, `b_act`, `b_del`, `b_sys`, `fk_src_cus_cur_n`, `fk_src_cus_uom_n`, `fk_src_cus_sal_agt_n`, `fk_src_req_cur_n`, `fk_src_req_uom_n`, `fk_des_req_pay_met_n`, `fk_lst_etl_log`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, '7230', 3, 1, '001', 'ALPHANUMERICS', 'ALPHA', '256', 'juytgh', '4465', '4598', '4568', '46845', '555', '666', '777', '888', '999', '999', '54887', '9878', '5465', '6548', 1, '10.00', '879', '7897', NULL, NULL, NULL, NULL, NULL, '12', '12', '2018-05-10 12:00:00', '2018-05-10 12:00:00', 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 4, '2018-05-10 12:00:00', '2018-05-10 12:00:00'),
(2, '4620', 4, 1, '002', 'JOSÉ DE JESÚS', 'JOSÉ', '256', 'LKHUYU', '4456', '42368', '4875', '4213', '444', '555', '666', '777', '888', '555', '888', '7845', '5453', '3755', 1, '10.00', '897', '8995', NULL, NULL, NULL, NULL, NULL, '12', '12', '2018-05-10 12:00:00', '2018-05-10 12:00:00', 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 4, '2018-05-10 12:00:00', '2018-05-10 12:00:00'),
(3, '4620', 1, 1, '003', 'PRUEBA_01', 'PRUEBAS_01', '256', 'STR01', '445601', '445601', '4875', '4213', '666', '444', '555', '111', '222', '888', '1', '11', '1', '1', 1, '1.00', '897', '8995', NULL, NULL, NULL, NULL, NULL, '12', '12', '2018-01-17 00:00:00', '2018-01-17 00:00:00', 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, '2018-01-17 00:00:00', '2018-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `au_itm`
--

CREATE TABLE `au_itm` (
  `id_itm` int(10) UNSIGNED NOT NULL,
  `des_itm_id` int(10) UNSIGNED NOT NULL,
  `code` char(25) NOT NULL,
  `name` char(105) NOT NULL,
  `name_brd_type` char(100) NOT NULL,
  `name_flu` char(5) NOT NULL,
  `src_brd_type_fk` smallint(5) UNSIGNED NOT NULL,
  `src_flu_fk` char(5) NOT NULL,
  `src_cus_fk_n` char(25) DEFAULT NULL,
  `src_req_cur_fk_n` smallint(5) UNSIGNED DEFAULT NULL,
  `src_req_uom_fk_n` char(25) DEFAULT NULL,
  `fst_etl_ins` datetime NOT NULL,
  `lst_etl_upd` datetime NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_cus_n` int(10) UNSIGNED DEFAULT NULL,
  `fk_src_req_cur_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_req_uom_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_lst_etl_log` int(10) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `au_sal_agt`
--

CREATE TABLE `au_sal_agt` (
  `id_sal_agt` smallint(5) UNSIGNED NOT NULL,
  `src_sal_agt_id` int(10) UNSIGNED NOT NULL,
  `des_sal_agt_id` int(10) UNSIGNED NOT NULL,
  `code` char(50) NOT NULL,
  `name` char(100) NOT NULL,
  `fst_etl_ins` datetime NOT NULL,
  `lst_etl_upd` datetime NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_lst_etl_log` int(10) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `au_sal_agt`
--

INSERT INTO `au_sal_agt` (`id_sal_agt`, `src_sal_agt_id`, `des_sal_agt_id`, `code`, `name`, `fst_etl_ins`, `lst_etl_upd`, `b_del`, `b_sys`, `fk_lst_etl_log`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 3, 3, '001', 'AGENTE DE VENTAS', '2018-05-10 12:00:00', '2018-05-10 12:00:00', 0, 0, 1, 1, 1, '2018-05-10 12:00:00', '2018-05-10 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_cfg`
--

CREATE TABLE `a_cfg` (
  `id_cfg` smallint(5) UNSIGNED NOT NULL,
  `avi_host` char(50) NOT NULL,
  `avi_port` smallint(5) UNSIGNED NOT NULL,
  `avi_name` char(50) NOT NULL,
  `avi_user` char(25) NOT NULL,
  `avi_pswd` char(25) NOT NULL,
  `b_gui_etl_upd_data` tinyint(1) NOT NULL,
  `gui_etl_upd_mode` smallint(5) UNSIGNED NOT NULL,
  `inv_ser` char(25) NOT NULL,
  `inv_num_sta` smallint(5) UNSIGNED NOT NULL,
  `des_com_fk` smallint(5) UNSIGNED NOT NULL,
  `des_com_bra_fk` smallint(5) UNSIGNED NOT NULL,
  `des_loc_cty_fk` smallint(5) UNSIGNED NOT NULL,
  `des_loc_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `des_def_cc_fk` char(32) NOT NULL,
  `des_def_itm_gen_fk` smallint(5) UNSIGNED NOT NULL,
  `des_itm_code_pfx` char(25) NOT NULL,
  `des_cfdi_zip_iss` char(5) NOT NULL,
  `des_cfdi_tax_reg` char(3) NOT NULL,
  `des_cfdi_cfd_use` char(3) NOT NULL,
  `src_loc_cty_fk` char(25) NOT NULL,
  `src_loc_sta_fk` char(25) NOT NULL,
  `src_loc_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `src_def_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `src_def_uom_fk` char(25) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_src_loc_cur` smallint(5) UNSIGNED NOT NULL,
  `fk_src_def_cur` smallint(5) UNSIGNED NOT NULL,
  `fk_src_def_uom` smallint(5) UNSIGNED NOT NULL,
  `fk_des_def_pay_met` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a_cfg`
--

INSERT INTO `a_cfg` (`id_cfg`, `avi_host`, `avi_port`, `avi_name`, `avi_user`, `avi_pswd`, `b_gui_etl_upd_data`, `gui_etl_upd_mode`, `inv_ser`, `inv_num_sta`, `des_com_fk`, `des_com_bra_fk`, `des_loc_cty_fk`, `des_loc_cur_fk`, `des_def_cc_fk`, `des_def_itm_gen_fk`, `des_itm_code_pfx`, `des_cfdi_zip_iss`, `des_cfdi_tax_reg`, `des_cfdi_cfd_use`, `src_loc_cty_fk`, `src_loc_sta_fk`, `src_loc_cur_fk`, `src_def_cur_fk`, `src_def_uom_fk`, `b_del`, `b_sys`, `fk_src_loc_cur`, `fk_src_def_cur`, `fk_src_def_uom`, `fk_des_def_pay_met`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, '10.83.30.17', 1433, 'pltfloor', 'ats', 'ats001', 0, 0, 'F', 1, 1, 1, 1, 1, '', 0, 'PT', '54616', '601', 'G01', 'MX', 'MEX', 2, 2, 'MSM', 0, 0, 1, 1, 1, 99, 1, 1, '2018-01-05 12:55:19', '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_etl_log`
--

CREATE TABLE `a_etl_log` (
  `id_etl_log` int(10) UNSIGNED NOT NULL,
  `etl_mode` smallint(5) UNSIGNED NOT NULL,
  `dat_sta` date NOT NULL,
  `dat_end` date NOT NULL,
  `dat_iss_n` date DEFAULT NULL,
  `inv_bat` smallint(5) UNSIGNED NOT NULL,
  `b_upd_data` tinyint(1) NOT NULL,
  `upd_mode` smallint(5) UNSIGNED NOT NULL,
  `ts_sta` datetime NOT NULL,
  `ts_end_n` datetime DEFAULT NULL,
  `step` smallint(5) UNSIGNED NOT NULL,
  `step_aux` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a_etl_log`
--

INSERT INTO `a_etl_log` (`id_etl_log`, `etl_mode`, `dat_sta`, `dat_end`, `dat_iss_n`, `inv_bat`, `b_upd_data`, `upd_mode`, `ts_sta`, `ts_end_n`, `step`, `step_aux`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 2, '2018-05-10', '2018-05-10', '2018-05-10', 1, 0, 1, '2018-05-10 12:00:00', '2018-05-10 12:00:00', 1, 1, 0, 0, 4, 4, '2018-05-10 12:00:00', '2018-05-10 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_exr`
--

CREATE TABLE `a_exr` (
  `id_cur` smallint(5) UNSIGNED NOT NULL,
  `id_exr` int(10) UNSIGNED NOT NULL,
  `dat` date NOT NULL,
  `exr` decimal(23,8) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_inv`
--

CREATE TABLE `a_inv` (
  `id_inv` int(10) UNSIGNED NOT NULL,
  `src_inv_id` int(10) UNSIGNED NOT NULL,
  `des_inv_yea_id` smallint(5) UNSIGNED NOT NULL,
  `des_inv_doc_id` int(10) UNSIGNED NOT NULL,
  `ori_num` char(25) NOT NULL,
  `fin_ser` char(25) NOT NULL,
  `fin_num` char(25) NOT NULL,
  `ori_dat` date NOT NULL,
  `fin_dat` date NOT NULL,
  `pay_acc` char(25) NOT NULL,
  `cdt_day` smallint(5) UNSIGNED NOT NULL,
  `ori_amt` decimal(17,2) NOT NULL,
  `fin_amt` decimal(17,2) NOT NULL,
  `exr` decimal(23,8) NOT NULL,
  `batch` smallint(5) UNSIGNED NOT NULL,
  `pay_cnd` char(100) NOT NULL,
  `cus_ord` char(50) NOT NULL,
  `bol` char(50) NOT NULL,
  `src_cus_fk` char(25) NOT NULL,
  `des_cus_fk` int(10) UNSIGNED NOT NULL,
  `src_sal_agt_fk` int(10) UNSIGNED NOT NULL,
  `des_sal_agt_fk` int(10) UNSIGNED NOT NULL,
  `src_ori_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `src_fin_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `des_ori_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `des_fin_cur_fk` smallint(5) UNSIGNED NOT NULL,
  `des_pay_met_fk` smallint(5) UNSIGNED NOT NULL,
  `des_cfdi_zip_iss` char(5) NOT NULL,
  `des_cfdi_tax_reg` char(3) NOT NULL,
  `des_cfdi_pay_way` char(2) NOT NULL,
  `des_cfdi_cfd_use` char(3) NOT NULL,
  `fst_etl_ins` datetime NOT NULL,
  `lst_etl_upd` datetime NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_src_cus` int(10) UNSIGNED NOT NULL,
  `fk_src_sal_agt_n` smallint(5) UNSIGNED DEFAULT NULL,
  `fk_src_ori_cur` smallint(5) UNSIGNED NOT NULL,
  `fk_src_fin_cur` smallint(5) UNSIGNED NOT NULL,
  `fk_des_pay_met` smallint(5) UNSIGNED NOT NULL,
  `fk_lst_etl_log` int(10) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a_inv`
--

INSERT INTO `a_inv` (`id_inv`, `src_inv_id`, `des_inv_yea_id`, `des_inv_doc_id`, `ori_num`, `fin_ser`, `fin_num`, `ori_dat`, `fin_dat`, `pay_acc`, `cdt_day`, `ori_amt`, `fin_amt`, `exr`, `batch`, `pay_cnd`, `cus_ord`, `bol`, `src_cus_fk`, `des_cus_fk`, `src_sal_agt_fk`, `des_sal_agt_fk`, `src_ori_cur_fk`, `src_fin_cur_fk`, `des_ori_cur_fk`, `des_fin_cur_fk`, `des_pay_met_fk`, `des_cfdi_zip_iss`, `des_cfdi_tax_reg`, `des_cfdi_pay_way`, `des_cfdi_cfd_use`, `fst_etl_ins`, `lst_etl_upd`, `b_del`, `b_sys`, `fk_src_cus`, `fk_src_sal_agt_n`, `fk_src_ori_cur`, `fk_src_fin_cur`, `fk_des_pay_met`, `fk_lst_etl_log`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 80807, 2018, 2587, '77816', 'FAC', '589', '2018-05-10', '2018-05-10', 'lklklk', 12, '10.00', '10.00', '10.00000000', 3, 'pay_cnd', 'cus_ord', '81194', '1212', 12, 12, 12, 12, 12, 12, 12, 21, 'zip', 'tax', 'pa', 'use', '2018-05-10 12:00:00', '2018-05-10 12:00:00', 0, 0, 1, 1, 1, 1, 11, 1, 1, 1, '2018-05-10 12:00:00', '2018-05-10 12:00:00'),
(2, 80808, 2018, 2588, '77817', 'FAC', '510', '2018-05-10', '2018-05-10', 'lolol', 13, '11.00', '11.00', '11.00000000', 3, 'pay', 'cus', '81195', '1212', 12, 12, 12, 21, 212, 121, 12, 21, 'zip', 'tax', 'pa', 'use', '2018-05-10 12:01:00', '2018-05-10 12:01:01', 0, 0, 1, 1, 1, 1, 11, 1, 1, 1, '2018-05-10 12:01:00', '2018-05-10 12:01:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_inv_row`
--

CREATE TABLE `a_inv_row` (
  `id_inv` int(10) UNSIGNED NOT NULL,
  `id_row` smallint(5) UNSIGNED NOT NULL,
  `src_inv_id` int(10) UNSIGNED NOT NULL,
  `src_inv_row_id` smallint(5) UNSIGNED NOT NULL,
  `code` char(35) NOT NULL,
  `name` char(130) NOT NULL,
  `pro_dsc` char(255) NOT NULL,
  `cus_ord` char(50) NOT NULL,
  `ord_num` char(50) NOT NULL,
  `ord_dsc` char(255) NOT NULL,
  `est_num` char(50) NOT NULL,
  `est_dsc` char(255) NOT NULL,
  `qty_ord` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `len` decimal(23,8) NOT NULL,
  `wid` decimal(23,8) NOT NULL,
  `are` decimal(23,8) NOT NULL,
  `wei` decimal(23,8) NOT NULL,
  `ori_prc` decimal(23,8) NOT NULL,
  `ori_prc_unt` char(10) NOT NULL,
  `ori_unt` decimal(23,8) NOT NULL,
  `ori_amt` decimal(17,2) NOT NULL,
  `fin_prc` decimal(23,8) NOT NULL,
  `fin_prc_unt` char(10) NOT NULL,
  `fin_unt` decimal(23,8) NOT NULL,
  `fin_amt` decimal(17,2) NOT NULL,
  `src_brd_type` char(30) NOT NULL,
  `src_brd_type_fk` smallint(5) UNSIGNED NOT NULL,
  `src_flu_fk` char(5) NOT NULL,
  `des_itm_fk` int(10) UNSIGNED NOT NULL,
  `src_ori_uom_fk` char(25) NOT NULL,
  `src_fin_uom_fk` char(25) NOT NULL,
  `des_ori_uom_fk` smallint(5) UNSIGNED NOT NULL,
  `des_fin_uom_fk` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_itm` int(10) UNSIGNED NOT NULL,
  `fk_src_ori_uom` smallint(5) UNSIGNED NOT NULL,
  `fk_src_fin_uom` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cs_usr_tp`
--

CREATE TABLE `cs_usr_tp` (
  `id_usr_tp` smallint(5) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` char(50) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cs_usr_tp`
--

INSERT INTO `cs_usr_tp` (`id_usr_tp`, `code`, `name`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, 'U', 'USUARIO ESTÁNDAR', 1, 0, 1, '2018-01-05 12:55:19'),
(2, 'A', 'ADMINISTRADOR', 2, 0, 1, '2018-01-05 12:55:19'),
(3, 'S', 'SUPERVISOR', 3, 0, 1, '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cu_usr`
--

CREATE TABLE `cu_usr` (
  `id_usr` smallint(5) UNSIGNED NOT NULL,
  `des_usr_id` smallint(5) UNSIGNED NOT NULL,
  `name` char(100) NOT NULL,
  `pswd` char(60) NOT NULL,
  `b_web` tinyint(1) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_tp` smallint(5) UNSIGNED NOT NULL,
  `fk_web_role` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cu_usr`
--

INSERT INTO `cu_usr` (`id_usr`, `des_usr_id`, `name`, `pswd`, `b_web`, `b_del`, `b_sys`, `fk_usr_tp`, `fk_web_role`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 1, '', '*637A12C059F1FB77BE8F25FDDFB958C7278ED1D1', 0, 1, 1, 1, 1, 1, 1, '2018-01-05 12:55:19', '2018-01-05 12:55:19'),
(2, 1, 'admor', '*76B4966388AFED53E8642546BE8C5DD6BC68C38C', 0, 0, 1, 2, 1, 1, 1, '2018-01-05 12:55:19', '2018-01-05 12:55:19'),
(3, 1, 'super', '*F85A86E6F55A370C1A115F696A9AD71A7869DB81', 0, 0, 1, 3, 1, 1, 1, '2018-01-05 12:55:19', '2018-01-05 12:55:19'),
(4, 0, 'admin', '$2y$10$JiwIuIsOOKxh.TLScdaJaenLmaK.fSyMs4ieyT0SfmNKRAixSUOX2', 1, 0, 0, 1, 11, 1, 1, '2018-01-05 12:55:22', '2018-01-05 12:55:22'),
(5, 0, 'GIL@MAIL.COM', '$2y$10$TA0rUOOyRw1Bt9Z95sx7v.GhObJcliR2wnAhm4K8CR.WMVJ/NcIXG', 1, 0, 0, 1, 21, 3, 1, '2018-01-05 15:13:44', '2018-01-05 15:13:44'),
(6, 0, 'GEDFECAM@GMAIL.COM', '$2y$10$evSDw30d9/az8hVaLxIxP.DmAALufQG0VCedlNO9TR0VSl3aNJ9um', 1, 0, 0, 1, 31, 3, 3, '2018-01-05 16:53:51', '2018-01-05 16:54:46'),
(7, 0, 'SINPASS@GMAIL.COM', '$2y$10$EAeZbDn93d.b78jdFljkEeUzspO.JVaw/hf73rElo/u05fjCkOmFK', 1, 0, 0, 1, 31, 3, 1, '2018-01-08 09:05:47', '2018-01-08 09:05:47'),
(8, 0, 'DANIELL@GMAIL.COM', '$2y$10$ksLe8sOvJv4rOmXlJq6Kaexhw9OGxtLTWrB/kYvWutqQHqnShOmRq', 1, 0, 0, 1, 31, 3, 1, '2018-01-08 15:09:04', '2018-01-08 15:09:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_cfg`
--

CREATE TABLE `c_cfg` (
  `id_cfg` smallint(5) UNSIGNED NOT NULL,
  `ver` smallint(5) UNSIGNED NOT NULL,
  `ver_ts` datetime NOT NULL,
  `sie_host` char(50) NOT NULL,
  `sie_port` smallint(5) UNSIGNED NOT NULL,
  `sie_name` char(50) NOT NULL,
  `sie_user` char(25) NOT NULL,
  `sie_pswd` char(25) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_cfg`
--

INSERT INTO `c_cfg` (`id_cfg`, `ver`, `ver_ts`, `sie_host`, `sie_port`, `sie_name`, `sie_user`, `sie_pswd`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 10010, '2018-01-19 16:24:09', 'localhost', 3306, 'th', 'root', 'msroot', 0, 0, 1, 1, '2018-01-05 12:55:19', '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_usr_gui`
--

CREATE TABLE `c_usr_gui` (
  `id_usr` smallint(5) UNSIGNED NOT NULL,
  `id_gui` int(10) UNSIGNED NOT NULL,
  `id_gui_tp` int(10) UNSIGNED NOT NULL,
  `id_gui_stp` int(10) UNSIGNED NOT NULL,
  `id_gui_md` int(10) UNSIGNED NOT NULL,
  `id_gui_smd` int(10) UNSIGNED NOT NULL,
  `gui` text NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_usr_gui`
--

INSERT INTO `c_usr_gui` (`id_usr`, `id_gui`, `id_gui_tp`, `id_gui_stp`, `id_gui_md`, `id_gui_smd`, `gui`, `b_del`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(3, 2, 222051, 0, 0, 0, '<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>\n<!-- Copyright 2010-2015 Software Aplicado, SA de CV. All rights reserved. -->\n<Grid xmlns=\"http://www.swaplicado.com.mx\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" autoReload=\"true\">\n<Column columnType=\"422\" columnTitle=\"Nombre\" columnWidth=\"200\" fieldName=\"f_name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"413\" columnTitle=\"Código\" columnWidth=\"97\" fieldName=\"f_code\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"423\" columnTitle=\"Mail\" columnWidth=\"300\" fieldName=\"sh.mail\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"301\" columnTitle=\"Eliminado\" columnWidth=\"50\" fieldName=\"b_del\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"301\" columnTitle=\"Sistema\" columnWidth=\"50\" fieldName=\"b_sys\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"428\" columnTitle=\"Usr nvo\" columnWidth=\"100\" fieldName=\"f_usr_ins\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"502\" columnTitle=\"Usr TS nvo\" columnWidth=\"110\" fieldName=\"ts_usr_ins\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"428\" columnTitle=\"Usr mod\" columnWidth=\"100\" fieldName=\"f_usr_upd\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"502\" columnTitle=\"Usr TS mod\" columnWidth=\"110\" fieldName=\"ts_usr_upd\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<SortKey column=\"0\" sortOrder=\"ASCENDING\"/>\n</Grid>', 0, 3, 3, '2018-01-05 15:13:44', '2018-01-09 08:11:42'),
(3, 2, 223011, 0, 0, 0, '<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>\n<!-- Copyright 2010-2015 Software Aplicado, SA de CV. All rights reserved. -->\n<Grid xmlns=\"http://www.swaplicado.com.mx\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" autoReload=\"true\">\n<Column columnType=\"414\" columnTitle=\"Número\" columnWidth=\"100\" fieldName=\"f_code\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"421\" columnTitle=\"Transportista\" columnWidth=\"100\" fieldName=\"sp.name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"421\" columnTitle=\"Vehículo\" columnWidth=\"100\" fieldName=\"vh.name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"414\" columnTitle=\"Placas vehículo\" columnWidth=\"100\" fieldName=\"sh.vehic_plate\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"422\" columnTitle=\"Chofer\" columnWidth=\"200\" fieldName=\"sh.driver_name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"501\" columnTitle=\"Fecha\" columnWidth=\"65\" fieldName=\"f_date\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"414\" columnTitle=\"Estatus\" columnWidth=\"100\" fieldName=\"f_name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"301\" columnTitle=\"Anulado\" columnWidth=\"50\" fieldName=\"sh.b_ann\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"301\" columnTitle=\"Eliminado\" columnWidth=\"50\" fieldName=\"b_del\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"301\" columnTitle=\"Sistema\" columnWidth=\"50\" fieldName=\"b_sys\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"428\" columnTitle=\"Usr nvo\" columnWidth=\"100\" fieldName=\"f_usr_ins\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"502\" columnTitle=\"Usr TS nvo\" columnWidth=\"110\" fieldName=\"ts_usr_ins\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"428\" columnTitle=\"Usr mod\" columnWidth=\"100\" fieldName=\"f_usr_upd\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"502\" columnTitle=\"Usr TS mod\" columnWidth=\"110\" fieldName=\"ts_usr_upd\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"428\" columnTitle=\"Usr Libera\" columnWidth=\"100\" fieldName=\"ur.name\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<Column columnType=\"502\" columnTitle=\"Usr TS Libera\" columnWidth=\"110\" fieldName=\"sh.ts_usr_release\" cellRenderer=\"0\" isSumApplying=\"false\"/>\n<SortKey column=\"4\" sortOrder=\"DESCENDING\"/>\n<SortKey column=\"0\" sortOrder=\"ASCENDING\"/>\n</Grid>', 0, 3, 1, '2018-01-19 16:24:24', '2018-01-19 16:24:24'),
(3, 4, 223016, 0, 0, 0, '<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>\n<!-- Copyright 2010-2015 Software Aplicado, SA de CV. All rights reserved. -->\n<Grid xmlns=\"http://www.swaplicado.com.mx\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" autoReload=\"false\">\n<Column columnType=\"111\" columnTitle=\"Remisión\" columnWidth=\"60\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"413\" columnTitle=\"Invoice\" columnWidth=\"50\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"501\" columnTitle=\"Fecha invoice\" columnWidth=\"65\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"424\" columnTitle=\"Cliente\" columnWidth=\"150\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"421\" columnTitle=\"Destino\" columnWidth=\"100\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"241\" columnTitle=\"m²\" columnWidth=\"100\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<Column columnType=\"241\" columnTitle=\"kg\" columnWidth=\"100\" fieldName=\"\" cellRenderer=\"0\" isEditable=\"false\"/>\n<SortKey column=\"0\" sortOrder=\"ASCENDING\"/>\n</Grid>', 0, 3, 3, '2018-01-05 13:07:27', '2018-01-19 16:49:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ss_shipt_st`
--

CREATE TABLE `ss_shipt_st` (
  `id_shipt_st` smallint(5) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` char(50) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ss_shipt_st`
--

INSERT INTO `ss_shipt_st` (`id_shipt_st`, `code`, `name`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, 'PL', 'POR LIBERAR', 1, 0, 1, '2018-01-05 12:55:21'),
(2, 'L', 'LIBERADO', 2, 0, 1, '2018-01-05 12:55:21'),
(11, 'PA', 'POR ACEPTAR', 11, 0, 1, '2018-01-05 12:55:21'),
(12, 'A', 'ACEPTADO', 12, 0, 1, '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ss_web_role`
--

CREATE TABLE `ss_web_role` (
  `id_web_role` smallint(5) UNSIGNED NOT NULL,
  `code` char(5) NOT NULL,
  `name` char(50) NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `ts_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ss_web_role`
--

INSERT INTO `ss_web_role` (`id_web_role`, `code`, `name`, `sort`, `b_del`, `fk_usr`, `ts_usr`) VALUES
(1, 'NA', '(N/A)', 1, 0, 1, '2018-01-05 12:55:21'),
(11, 'PL', 'ADMINISTRADOR', 11, 0, 1, '2018-01-05 12:55:21'),
(21, 'L', 'CRÉDITO Y COBRANZA', 21, 0, 1, '2018-01-05 12:55:21'),
(31, 'PA', 'TRANSPORTISTA', 31, 0, 1, '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_cargo_tp`
--

CREATE TABLE `su_cargo_tp` (
  `id_cargo_tp` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_cargo_tp`
--

INSERT INTO `su_cargo_tp` (`id_cargo_tp`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'VOL', 'VOLUMINOSA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(2, 'UNI', 'UNITIZADA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(3, 'PAL', 'PALETIZADA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(4, 'GRA', 'A GRANEL', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(10, 'OTR', 'OTRA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_comment`
--

CREATE TABLE `su_comment` (
  `id_comment` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_comment`
--

INSERT INTO `su_comment` (`id_comment`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'C1', 'MATERIAL COMPLETO Y EMBARCADO EN BUENAS CONDICIONES', 0, 0, 1, 1, '2018-01-05 12:55:22', '2018-01-05 12:55:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_destin`
--

CREATE TABLE `su_destin` (
  `id_destin` smallint(5) UNSIGNED NOT NULL,
  `site_loc_id` int(10) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_destin`
--

INSERT INTO `su_destin` (`id_destin`, `site_loc_id`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 0, 'NA', '(N/A)', 0, 1, 1, 1, '2018-01-05 12:55:22', '2018-01-05 12:55:22'),
(2, 802, '', 'SAN LUIS POTOSI, SLP, 78433', 0, 0, 3, 1, '2018-01-05 15:34:46', '2018-01-05 15:34:46'),
(3, 778, '', 'ESTADO DE MEXICO, MEX, 54949', 0, 0, 3, 1, '2018-01-05 15:34:46', '2018-01-05 15:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_handg_tp`
--

CREATE TABLE `su_handg_tp` (
  `id_handg_tp` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_handg_tp`
--

INSERT INTO `su_handg_tp` (`id_handg_tp`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'SIN', 'SIN MANIOBRA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(2, 'A', 'TIPO A', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(3, 'B', 'TIPO B', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(10, 'OTR', 'OTRA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_shipper`
--

CREATE TABLE `su_shipper` (
  `id_shipper` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `mail` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_shipper`
--

INSERT INTO `su_shipper` (`id_shipper`, `code`, `name`, `mail`, `b_del`, `b_sys`, `fk_usr`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'NA', '(N/A)', '', 0, 1, 1, 1, 1, '2018-01-05 12:55:22', '2018-01-05 12:55:22'),
(2, '001', 'FLETES GIL', 'GIL@MAIL.COM', 0, 0, 5, 3, 1, '2018-01-05 15:13:44', '2018-01-05 15:13:44'),
(3, 'MASDJKÑDF', 'ALFREDO', 'ALPHA@GMAIL.COM', 0, 0, 6, 3, 3, '2018-01-05 16:54:46', '2018-01-05 16:54:46'),
(4, '002', 'SINPASS', 'SINPASS@GMAIL.COM', 0, 0, 7, 3, 1, '2018-01-08 09:05:47', '2018-01-08 09:05:47'),
(5, '08012018', 'DANIEL LOPEZ', 'DANIELL@GMAIL.COM', 0, 0, 8, 3, 1, '2018-01-08 15:09:04', '2018-01-08 15:09:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_shipt_tp`
--

CREATE TABLE `su_shipt_tp` (
  `id_shipt_tp` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_shipt_tp`
--

INSERT INTO `su_shipt_tp` (`id_shipt_tp`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'ENT', 'ENTREGA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(2, 'DEV', 'DEVOLUCIÓN', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(10, 'OTR', 'OTRO', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_vehic_tp`
--

CREATE TABLE `su_vehic_tp` (
  `id_vehic_tp` smallint(5) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` char(100) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_vehic_tp`
--

INSERT INTO `su_vehic_tp` (`id_vehic_tp`, `code`, `name`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'CAM15', 'CAMIONETA 1.5', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(2, 'CAM35', 'CAMIONETA 3.5', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(3, 'CAM55', 'CAMIONETA 5.5', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(4, 'TOR', 'TORTON', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(5, 'RAB', 'RABÓN', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(6, 'TRA48', 'TRAILER 48 FT', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(7, 'TRA53', 'TRAILER 53 FT', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(8, 'PLA', 'PLANA', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(9, 'CTE', 'CLIENTE RECOGE', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21'),
(10, 'OTR', 'OTRO', 0, 0, 1, 1, '2018-01-05 12:55:21', '2018-01-05 12:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_cfg`
--

CREATE TABLE `s_cfg` (
  `id_cfg` int(10) UNSIGNED NOT NULL,
  `url_sms` char(255) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `s_cfg`
--

INSERT INTO `s_cfg` (`id_cfg`, `url_sms`, `b_del`, `b_sys`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 'www.cartro.com.mx/sms', 0, 0, 1, 1, '2018-01-08 10:44:05', '2018-01-08 10:44:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_evidence`
--

CREATE TABLE `s_evidence` (
  `id_evidence` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `b_accept` tinyint(1) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_ship_ship` int(10) UNSIGNED NOT NULL,
  `fk_ship_row` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upload` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_accept` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_upload` datetime NOT NULL,
  `ts_usr_accept` datetime NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `s_evidence`
--

INSERT INTO `s_evidence` (`id_evidence`, `file_name`, `file_location`, `b_accept`, `b_del`, `b_sys`, `fk_ship_ship`, `fk_ship_row`, `fk_usr_upload`, `fk_usr_accept`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_upload`, `ts_usr_accept`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, '3-000-001.gif', 'uploads/2018/3_77816/', 0, 1, 0, 3, 1, 6, 1, 1, 1, '2018-01-11 12:28:41', '2018-01-11 12:28:41', '2018-01-11 12:28:41', '2018-01-11 12:28:41'),
(2, '3-000-001.jpg', 'uploads/2018/3_77817/', 1, 0, 0, 3, 2, 6, 5, 1, 1, '2018-01-11 12:28:57', '2018-01-11 12:28:57', '2018-01-11 12:28:57', '2018-01-11 12:28:57'),
(3, '3-000-002.gif', 'uploads/2018/3_77816/', 0, 1, 0, 3, 1, 6, 8, 1, 1, '2018-01-11 12:39:51', '2018-01-11 12:39:51', '2018-01-11 12:39:51', '2018-01-11 12:39:51'),
(4, '1-000-001.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-12 09:51:40', '2018-01-12 09:51:40', '2018-01-12 09:51:40', '2018-01-12 09:51:40'),
(5, '1-000-002.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:01:17', '2018-01-12 15:01:17', '2018-01-12 15:01:17', '2018-01-12 15:01:17'),
(6, '1-000-003.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:28:15', '2018-01-12 15:28:15', '2018-01-12 15:28:15', '2018-01-12 15:28:15'),
(7, '1-000-004.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:34:30', '2018-01-12 15:34:30', '2018-01-12 15:34:30', '2018-01-12 15:34:30'),
(8, '1-000-005.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:34:30', '2018-01-12 15:34:30', '2018-01-12 15:34:30', '2018-01-12 15:34:30'),
(9, '1-000-006.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:52:59', '2018-01-12 15:52:59', '2018-01-12 15:52:59', '2018-01-12 15:52:59'),
(10, '1-000-007.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 15:56:54', '2018-01-12 15:56:54', '2018-01-12 15:56:54', '2018-01-12 15:56:54'),
(11, '1-000-008.png', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-12 15:59:33', '2018-01-12 15:59:33', '2018-01-12 15:59:33', '2018-01-12 15:59:33'),
(12, '1-000-009.jpg', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 8, 1, 1, 1, '2018-01-12 16:10:10', '2018-01-12 16:10:10', '2018-01-12 16:10:10', '2018-01-12 16:10:10'),
(13, '2-000-001.jpg', 'uploads/2018/2_77816/', 1, 0, 0, 2, 1, 5, 5, 1, 1, '2018-01-12 16:31:46', '2018-01-12 16:31:46', '2018-01-12 16:31:46', '2018-01-12 16:31:46'),
(14, '4-000-001.gif', 'uploads/2018/4_77816/', 1, 0, 0, 4, 1, 5, 5, 1, 1, '2018-01-12 16:33:08', '2018-01-12 16:33:08', '2018-01-12 16:33:08', '2018-01-12 16:33:08'),
(15, '1-000-0010.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:39:09', '2018-01-17 16:39:09', '2018-01-17 16:39:09', '2018-01-17 16:39:09'),
(16, '1-000-0011.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:39:09', '2018-01-17 16:39:09', '2018-01-17 16:39:09', '2018-01-17 16:39:09'),
(17, '1-000-0012.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:40:57', '2018-01-17 16:40:57', '2018-01-17 16:40:57', '2018-01-17 16:40:57'),
(18, '1-000-0013.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:41:57', '2018-01-17 16:41:57', '2018-01-17 16:41:57', '2018-01-17 16:41:57'),
(19, '1-000-0014.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:41:57', '2018-01-17 16:41:57', '2018-01-17 16:41:57', '2018-01-17 16:41:57'),
(20, '1-000-0015.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:52:55', '2018-01-17 16:52:55', '2018-01-17 16:52:55', '2018-01-17 16:52:55'),
(21, '1-000-0016.gif', 'uploads/2018/1_77816/', 0, 1, 0, 1, 1, 5, 1, 1, 1, '2018-01-17 16:52:55', '2018-01-17 16:52:55', '2018-01-17 16:52:55', '2018-01-17 16:52:55'),
(22, '1-000-0017.gif', 'uploads/2018/1_77816/', 0, 0, 0, 1, 1, 5, 1, 1, 1, '2018-01-18 12:28:18', '2018-01-18 12:28:18', '2018-01-18 12:28:18', '2018-01-18 12:28:18'),
(23, '1-000-0018.gif', 'uploads/2018/1_77816/', 0, 0, 0, 1, 1, 5, 1, 1, 1, '2018-01-18 12:28:18', '2018-01-18 12:28:18', '2018-01-18 12:28:18', '2018-01-18 12:28:18'),
(24, '1-000-0019.gif', 'uploads/2018/1_77816/', 0, 0, 0, 1, 1, 5, 1, 1, 1, '2018-01-19 10:00:57', '2018-01-19 10:00:57', '2018-01-19 10:00:57', '2018-01-19 10:00:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_shipt`
--

CREATE TABLE `s_shipt` (
  `id_shipt` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `shipt_date` date NOT NULL,
  `driver_name` char(50) NOT NULL,
  `driver_phone` char(25) NOT NULL,
  `vehic_plate` char(25) NOT NULL,
  `web_key` char(10) NOT NULL,
  `m2` decimal(19,4) NOT NULL,
  `kg` decimal(19,4) NOT NULL,
  `comments` text NOT NULL,
  `scale_tkt_1` int(10) UNSIGNED NOT NULL,
  `scale_tkt_1_dt_n` datetime DEFAULT NULL,
  `scale_tkt_1_kg` decimal(19,4) NOT NULL,
  `scale_tkt_2` int(10) UNSIGNED NOT NULL,
  `scale_tkt_2_dt_n` datetime DEFAULT NULL,
  `scale_tkt_2_kg` decimal(19,4) NOT NULL,
  `tare_kg` decimal(19,4) NOT NULL,
  `b_tared` tinyint(1) NOT NULL,
  `b_ann` tinyint(1) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `b_sys` tinyint(1) NOT NULL,
  `fk_shipt_st` smallint(5) UNSIGNED NOT NULL,
  `fk_shipt_tp` smallint(5) UNSIGNED NOT NULL,
  `fk_cargo_tp` smallint(5) UNSIGNED NOT NULL,
  `fk_handg_tp` smallint(5) UNSIGNED NOT NULL,
  `fk_vehic_tp` smallint(5) UNSIGNED NOT NULL,
  `fk_shipper` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_tare` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_release` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_accept` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ann` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_ins` smallint(5) UNSIGNED NOT NULL,
  `fk_usr_upd` smallint(5) UNSIGNED NOT NULL,
  `ts_usr_tare` datetime NOT NULL,
  `ts_usr_release` datetime NOT NULL,
  `ts_usr_accept` datetime NOT NULL,
  `ts_usr_ann` datetime NOT NULL,
  `ts_usr_ins` datetime NOT NULL,
  `ts_usr_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `s_shipt`
--

INSERT INTO `s_shipt` (`id_shipt`, `number`, `shipt_date`, `driver_name`, `driver_phone`, `vehic_plate`, `web_key`, `m2`, `kg`, `comments`, `scale_tkt_1`, `scale_tkt_1_dt_n`, `scale_tkt_1_kg`, `scale_tkt_2`, `scale_tkt_2_dt_n`, `scale_tkt_2_kg`, `tare_kg`, `b_tared`, `b_ann`, `b_del`, `b_sys`, `fk_shipt_st`, `fk_shipt_tp`, `fk_cargo_tp`, `fk_handg_tp`, `fk_vehic_tp`, `fk_shipper`, `fk_usr_tare`, `fk_usr_release`, `fk_usr_accept`, `fk_usr_ann`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_tare`, `ts_usr_release`, `ts_usr_accept`, `ts_usr_ann`, `ts_usr_ins`, `ts_usr_upd`) VALUES
(1, 1, '2018-01-05', 'GIL ENOC', '4498653215', 'GIL-8956', 'laroxf2qJZ', '15700.0610', '7368.9107', 'MATERIAL COMPLETO Y EMBARCADO EN BUENAS CONDICIONES\nGIL EMBARCO	', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 2, 1, 2, 2, 1, 5, 1, 3, 1, 1, 3, 1, '2018-01-05 15:34:42', '2018-01-05 15:34:42', '2018-01-05 15:34:42', '2018-01-05 15:34:42', '2018-01-05 15:34:42', '2018-01-05 15:34:42'),
(2, 2, '2018-01-06', 'GIL ENOC', '22222222', 'GIL-222', 'qZFSQJAqKx', '15700.0610', '7368.9107', 'segunda orden', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 12, 2, 2, 3, 2, 2, 1, 3, 1, 1, 3, 1, '2018-01-05 15:55:42', '2018-01-05 15:55:42', '2018-01-05 15:55:42', '2018-01-05 15:55:42', '2018-01-05 15:55:42', '2018-01-05 15:55:42'),
(3, 3, '2018-01-05', 'CESAR HERNANDEZ', '4435625847', 'JEPH', 'Svi7N5eBdU', '15700.0610', '7368.9108', 'MATERIAL COMPLETO Y EMBARCADO EN BUENAS CONDICIONES\n\nFALTÓ PONER OBSERVACIONES', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 12, 1, 1, 3, 7, 3, 1, 3, 1, 1, 3, 3, '2018-01-05 16:31:45', '2018-01-05 16:46:53', '2018-01-05 16:31:45', '2018-01-05 16:31:45', '2018-01-05 16:31:45', '2018-01-05 16:46:53'),
(4, 4, '2018-01-05', 'EDWIN', '3333333', 'PFZ9999', 'H7B8WrNZVG', '12230.2700', '6019.2539', 'MATERIAL COMPLETO Y EMBARCADO EN BUENAS CONDICIONES', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 12, 1, 1, 1, 5, 2, 1, 3, 1, 1, 3, 1, '2018-01-05 16:41:03', '2018-01-05 16:41:03', '2018-01-05 16:41:03', '2018-01-05 16:41:03', '2018-01-05 16:41:03', '2018-01-05 16:41:03'),
(5, 5, '2018-01-09', '>:v', '8888888', 'LOPD-5897', 'zCff1KE6xR', '15700.0610', '7368.9108', 'SIN MATERIAL :(', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 2, 1, 2, 2, 9, 5, 1, 3, 1, 1, 3, 3, '2018-01-09 16:45:34', '2018-01-09 16:48:35', '2018-01-09 16:45:34', '2018-01-09 16:45:34', '2018-01-09 16:45:34', '2018-01-09 16:48:35'),
(6, 6, '2018-01-09', '', '', '', 'UK8K1FKpV6', '15700.0610', '7368.9107', '', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 1, 10, 1, 2, 5, 2, 1, 1, 1, 1, 3, 1, '2018-01-09 16:52:58', '2018-01-09 16:52:58', '2018-01-09 16:52:58', '2018-01-09 16:52:58', '2018-01-09 16:52:58', '2018-01-09 16:52:58'),
(7, 7, '2018-01-10', '', '', '', 'WskfGwcE3d', '15700.0610', '7368.9107', 'MATERIAL COMPLETO Y EMBARCADO EN BUENAS CONDICIONES', 0, NULL, '0.0000', 0, NULL, '0.0000', '0.0000', 0, 0, 0, 0, 1, 1, 1, 1, 9, 1, 1, 1, 1, 1, 3, 1, '2018-01-10 12:55:12', '2018-01-10 12:55:12', '2018-01-10 12:55:12', '2018-01-10 12:55:12', '2018-01-10 12:55:12', '2018-01-10 12:55:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_shipt_row`
--

CREATE TABLE `s_shipt_row` (
  `id_shipt` int(10) UNSIGNED NOT NULL,
  `id_row` smallint(5) UNSIGNED NOT NULL,
  `delivery_id` int(10) UNSIGNED NOT NULL,
  `delivery_number` int(10) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `bol_id` int(10) UNSIGNED NOT NULL,
  `invoice_id_year` smallint(5) UNSIGNED NOT NULL,
  `invoice_id_doc` int(10) UNSIGNED NOT NULL,
  `invoice_series` char(25) NOT NULL,
  `invoice_number` char(25) NOT NULL,
  `orders` smallint(5) UNSIGNED NOT NULL,
  `bales` smallint(5) UNSIGNED NOT NULL,
  `m2` decimal(19,4) NOT NULL,
  `kg` decimal(19,4) NOT NULL,
  `fk_customer` int(10) UNSIGNED NOT NULL,
  `fk_destin` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `s_shipt_row`
--

INSERT INTO `s_shipt_row` (`id_shipt`, `id_row`, `delivery_id`, `delivery_number`, `delivery_date`, `bol_id`, `invoice_id_year`, `invoice_id_doc`, `invoice_series`, `invoice_number`, `orders`, `bales`, `m2`, `kg`, `fk_customer`, `fk_destin`) VALUES
(1, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(1, 2, 80808, 77817, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 11, '3469.7910', '1349.6569', 2, 3),
(1, 3, 80807, 77816, '2018-01-10', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(1, 4, 80808, 77817, '2018-01-10', 81195, 2018, 2588, 'FAC', '590', 8, 33, '12230.2700', '6019.2539', 1, 3),
(1, 5, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 2, 3),
(1, 6, 80808, 77816, '2018-01-18', 81195, 2018, 2587, 'FAC', '590', 8, 12, '123.1000', '2322.2000', 1, 3),
(1, 7, 80808, 77816, '2018-01-19', 81195, 2018, 2587, 'FAC', '591', 4, 4, '123.0000', '1234.0000', 1, 2),
(1, 8, 80808, 77817, '2018-01-19', 81194, 2018, 2588, 'FAC', '592', 7, 8, '1354.0000', '13131.0000', 1, 2),
(1, 9, 80807, 77817, '2018-01-19', 81194, 2018, 2587, 'FAC', '593', 8, 8, '654.0000', '64656.0000', 2, 3),
(1, 10, 80807, 77816, '2018-01-19', 81195, 2018, 2588, 'FAC', '594', 78, 5, '545.0000', '4545.0000', 2, 1),
(2, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(2, 2, 80808, 77817, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 11, '3469.7910', '1349.6569', 2, 3),
(3, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(3, 2, 80808, 77817, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 11, '3469.7910', '1349.6569', 2, 3),
(4, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(5, 1, 60807, 88888, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(5, 2, 60808, 88889, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 13, '3469.7910', '1349.6569', 2, 3),
(6, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(6, 2, 80808, 77817, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 13, '3469.7910', '1349.6569', 2, 3),
(7, 1, 80807, 77816, '2018-01-05', 81194, 2018, 2587, 'FAC', '589', 8, 33, '12230.2700', '6019.2539', 1, 2),
(7, 2, 80808, 77817, '2018-01-05', 81195, 2018, 2588, 'FAC', '510', 4, 13, '3469.7910', '1349.6569', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `as_cur`
--
ALTER TABLE `as_cur`
  ADD PRIMARY KEY (`id_cur`),
  ADD KEY `fk_as_cur_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `as_pay_met`
--
ALTER TABLE `as_pay_met`
  ADD PRIMARY KEY (`id_pay_met`),
  ADD KEY `fk_as_pay_met_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `as_uom`
--
ALTER TABLE `as_uom`
  ADD PRIMARY KEY (`id_uom`),
  ADD KEY `fk_as_uom_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `au_cus`
--
ALTER TABLE `au_cus`
  ADD PRIMARY KEY (`id_cus`),
  ADD KEY `fk_au_cus_fk_src_cus_cur_n` (`fk_src_cus_cur_n`),
  ADD KEY `fk_au_cus_fk_src_cus_uom_n` (`fk_src_cus_uom_n`),
  ADD KEY `fk_au_cus_fk_src_cus_sal_agt_n` (`fk_src_cus_sal_agt_n`),
  ADD KEY `fk_au_cus_fk_src_req_cur_n` (`fk_src_req_cur_n`),
  ADD KEY `fk_au_cus_fk_src_req_uom_n` (`fk_src_req_uom_n`),
  ADD KEY `fk_au_cus_fk_des_req_pay_met_n` (`fk_des_req_pay_met_n`),
  ADD KEY `fk_au_cus_fk_lst_etl_log` (`fk_lst_etl_log`),
  ADD KEY `fk_au_cus_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_au_cus_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `au_itm`
--
ALTER TABLE `au_itm`
  ADD PRIMARY KEY (`id_itm`),
  ADD KEY `fk_au_itm_fk_cus_n` (`fk_cus_n`),
  ADD KEY `fk_au_itm_fk_src_req_cur_n` (`fk_src_req_cur_n`),
  ADD KEY `fk_au_itm_fk_src_req_uom_n` (`fk_src_req_uom_n`),
  ADD KEY `fk_au_itm_fk_lst_etl_log` (`fk_lst_etl_log`),
  ADD KEY `fk_au_itm_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_au_itm_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `au_sal_agt`
--
ALTER TABLE `au_sal_agt`
  ADD PRIMARY KEY (`id_sal_agt`),
  ADD KEY `fk_au_sal_agt_fk_lst_etl_log` (`fk_lst_etl_log`),
  ADD KEY `fk_au_sal_agt_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_au_sal_agt_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `a_cfg`
--
ALTER TABLE `a_cfg`
  ADD PRIMARY KEY (`id_cfg`),
  ADD KEY `fk_a_cfg_fk_src_loc_cur` (`fk_src_loc_cur`),
  ADD KEY `fk_a_cfg_fk_src_def_cur` (`fk_src_def_cur`),
  ADD KEY `fk_a_cfg_fk_src_def_uom` (`fk_src_def_uom`),
  ADD KEY `fk_a_cfg_fk_des_def_pay_met` (`fk_des_def_pay_met`),
  ADD KEY `fk_a_cfg_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_a_cfg_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `a_etl_log`
--
ALTER TABLE `a_etl_log`
  ADD PRIMARY KEY (`id_etl_log`),
  ADD KEY `fk_a_etl_log_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_a_etl_log_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `a_exr`
--
ALTER TABLE `a_exr`
  ADD PRIMARY KEY (`id_cur`,`id_exr`),
  ADD KEY `fk_a_exr_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_a_exr_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `a_inv`
--
ALTER TABLE `a_inv`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `fk_a_inv_fk_src_cus` (`fk_src_cus`),
  ADD KEY `fk_a_inv_fk_src_sal_agt_n` (`fk_src_sal_agt_n`),
  ADD KEY `fk_a_inv_fk_src_ori_cur` (`fk_src_ori_cur`),
  ADD KEY `fk_a_inv_fk_src_fin_cur` (`fk_src_fin_cur`),
  ADD KEY `fk_a_inv_fk_des_pay_met` (`fk_des_pay_met`),
  ADD KEY `fk_a_inv_fk_lst_etl_log` (`fk_lst_etl_log`),
  ADD KEY `fk_a_inv_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_a_inv_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `a_inv_row`
--
ALTER TABLE `a_inv_row`
  ADD PRIMARY KEY (`id_inv`,`id_row`),
  ADD KEY `fk_a_inv_row_fk_itm` (`fk_itm`),
  ADD KEY `fk_a_inv_row_fk_src_ori_uom` (`fk_src_ori_uom`),
  ADD KEY `fk_a_inv_row_fk_src_fin_uom` (`fk_src_fin_uom`),
  ADD KEY `fk_a_inv_row_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_a_inv_row_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `cs_usr_tp`
--
ALTER TABLE `cs_usr_tp`
  ADD PRIMARY KEY (`id_usr_tp`),
  ADD KEY `fk_cs_usr_tp_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `cu_usr`
--
ALTER TABLE `cu_usr`
  ADD PRIMARY KEY (`id_usr`),
  ADD KEY `fk_cu_usr_fk_usr_tp` (`fk_usr_tp`),
  ADD KEY `fk_cu_usr_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_cu_usr_fk_usr_upd` (`fk_usr_upd`),
  ADD KEY `fk_cu_usr_fk_web_role` (`fk_web_role`);

--
-- Indices de la tabla `c_cfg`
--
ALTER TABLE `c_cfg`
  ADD PRIMARY KEY (`id_cfg`),
  ADD KEY `fk_c_cfg_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_c_cfg_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `c_usr_gui`
--
ALTER TABLE `c_usr_gui`
  ADD PRIMARY KEY (`id_usr`,`id_gui`,`id_gui_tp`,`id_gui_stp`,`id_gui_md`,`id_gui_smd`),
  ADD KEY `fk_c_usr_gui_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_c_usr_gui_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `ss_shipt_st`
--
ALTER TABLE `ss_shipt_st`
  ADD PRIMARY KEY (`id_shipt_st`),
  ADD KEY `fk_ss_shipt_st_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `ss_web_role`
--
ALTER TABLE `ss_web_role`
  ADD PRIMARY KEY (`id_web_role`),
  ADD KEY `fk_ss_web_role_fk_usr` (`fk_usr`);

--
-- Indices de la tabla `su_cargo_tp`
--
ALTER TABLE `su_cargo_tp`
  ADD PRIMARY KEY (`id_cargo_tp`),
  ADD KEY `fk_su_cargo_tp_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_cargo_tp_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_comment`
--
ALTER TABLE `su_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_su_comment_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_comment_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_destin`
--
ALTER TABLE `su_destin`
  ADD PRIMARY KEY (`id_destin`),
  ADD KEY `fk_su_destin_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_destin_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_handg_tp`
--
ALTER TABLE `su_handg_tp`
  ADD PRIMARY KEY (`id_handg_tp`),
  ADD KEY `fk_su_handg_tp_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_handg_tp_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_shipper`
--
ALTER TABLE `su_shipper`
  ADD PRIMARY KEY (`id_shipper`),
  ADD KEY `fk_su_shipper_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_shipper_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_shipt_tp`
--
ALTER TABLE `su_shipt_tp`
  ADD PRIMARY KEY (`id_shipt_tp`),
  ADD KEY `fk_su_shipt_tp_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_shipt_tp_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `su_vehic_tp`
--
ALTER TABLE `su_vehic_tp`
  ADD PRIMARY KEY (`id_vehic_tp`),
  ADD KEY `fk_su_vehic_tp_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_su_vehic_tp_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `s_cfg`
--
ALTER TABLE `s_cfg`
  ADD PRIMARY KEY (`id_cfg`),
  ADD KEY `fk_s_cfg_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_s_cfg_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `s_evidence`
--
ALTER TABLE `s_evidence`
  ADD PRIMARY KEY (`id_evidence`),
  ADD KEY `fk_s_evidence_fk_ship_ship` (`fk_ship_ship`,`fk_ship_row`),
  ADD KEY `fk_s_evidence_fk_usr_upload` (`fk_usr_upload`),
  ADD KEY `fk_s_evidence_fk_usr_accept` (`fk_usr_accept`),
  ADD KEY `fk_s_evidence_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_s_evidence_fk_usr_upd` (`fk_usr_upd`);

--
-- Indices de la tabla `s_shipt`
--
ALTER TABLE `s_shipt`
  ADD PRIMARY KEY (`id_shipt`),
  ADD KEY `fk_s_shipt_fk_shipt_st` (`fk_shipt_st`),
  ADD KEY `fk_s_shipt_fk_shipt_tp` (`fk_shipt_tp`),
  ADD KEY `fk_s_shipt_fk_cargo_tp` (`fk_cargo_tp`),
  ADD KEY `fk_s_shipt_fk_handg_tp` (`fk_handg_tp`),
  ADD KEY `fk_s_shipt_fk_vehic_tp` (`fk_vehic_tp`),
  ADD KEY `fk_s_shipt_fk_shipper` (`fk_shipper`),
  ADD KEY `fk_s_shipt_fk_usr_release` (`fk_usr_release`),
  ADD KEY `fk_s_shipt_fk_usr_accept` (`fk_usr_accept`),
  ADD KEY `fk_s_shipt_fk_usr_ann` (`fk_usr_ann`),
  ADD KEY `fk_s_shipt_fk_usr_ins` (`fk_usr_ins`),
  ADD KEY `fk_s_shipt_fk_usr_upd` (`fk_usr_upd`),
  ADD KEY `fk_s_shipt_fk_usr_tare` (`fk_usr_tare`);

--
-- Indices de la tabla `s_shipt_row`
--
ALTER TABLE `s_shipt_row`
  ADD PRIMARY KEY (`id_shipt`,`id_row`),
  ADD KEY `fk_s_shipt_row_fk_customer` (`fk_customer`),
  ADD KEY `fk_s_shipt_row_fk_destin` (`fk_destin`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `as_cur`
--
ALTER TABLE `as_cur`
  ADD CONSTRAINT `fk_as_cur_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `as_pay_met`
--
ALTER TABLE `as_pay_met`
  ADD CONSTRAINT `fk_as_pay_met_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `as_uom`
--
ALTER TABLE `as_uom`
  ADD CONSTRAINT `fk_as_uom_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `au_cus`
--
ALTER TABLE `au_cus`
  ADD CONSTRAINT `fk_au_cus_fk_des_req_pay_met_n` FOREIGN KEY (`fk_des_req_pay_met_n`) REFERENCES `as_pay_met` (`id_pay_met`),
  ADD CONSTRAINT `fk_au_cus_fk_lst_etl_log` FOREIGN KEY (`fk_lst_etl_log`) REFERENCES `a_etl_log` (`id_etl_log`),
  ADD CONSTRAINT `fk_au_cus_fk_src_cus_cur_n` FOREIGN KEY (`fk_src_cus_cur_n`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_au_cus_fk_src_cus_sal_agt_n` FOREIGN KEY (`fk_src_cus_sal_agt_n`) REFERENCES `au_sal_agt` (`id_sal_agt`),
  ADD CONSTRAINT `fk_au_cus_fk_src_cus_uom_n` FOREIGN KEY (`fk_src_cus_uom_n`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_au_cus_fk_src_req_cur_n` FOREIGN KEY (`fk_src_req_cur_n`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_au_cus_fk_src_req_uom_n` FOREIGN KEY (`fk_src_req_uom_n`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_au_cus_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_au_cus_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `au_itm`
--
ALTER TABLE `au_itm`
  ADD CONSTRAINT `fk_au_itm_fk_cus_n` FOREIGN KEY (`fk_cus_n`) REFERENCES `au_cus` (`id_cus`),
  ADD CONSTRAINT `fk_au_itm_fk_lst_etl_log` FOREIGN KEY (`fk_lst_etl_log`) REFERENCES `a_etl_log` (`id_etl_log`),
  ADD CONSTRAINT `fk_au_itm_fk_src_req_cur_n` FOREIGN KEY (`fk_src_req_cur_n`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_au_itm_fk_src_req_uom_n` FOREIGN KEY (`fk_src_req_uom_n`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_au_itm_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_au_itm_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `au_sal_agt`
--
ALTER TABLE `au_sal_agt`
  ADD CONSTRAINT `fk_au_sal_agt_fk_lst_etl_log` FOREIGN KEY (`fk_lst_etl_log`) REFERENCES `a_etl_log` (`id_etl_log`),
  ADD CONSTRAINT `fk_au_sal_agt_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_au_sal_agt_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `a_cfg`
--
ALTER TABLE `a_cfg`
  ADD CONSTRAINT `fk_a_cfg_fk_des_def_pay_met` FOREIGN KEY (`fk_des_def_pay_met`) REFERENCES `as_pay_met` (`id_pay_met`),
  ADD CONSTRAINT `fk_a_cfg_fk_src_def_cur` FOREIGN KEY (`fk_src_def_cur`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_a_cfg_fk_src_def_uom` FOREIGN KEY (`fk_src_def_uom`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_a_cfg_fk_src_loc_cur` FOREIGN KEY (`fk_src_loc_cur`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_a_cfg_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_cfg_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `a_etl_log`
--
ALTER TABLE `a_etl_log`
  ADD CONSTRAINT `fk_a_etl_log_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_etl_log_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `a_exr`
--
ALTER TABLE `a_exr`
  ADD CONSTRAINT `fk_a_exr_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_exr_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_exr_id_cur` FOREIGN KEY (`id_cur`) REFERENCES `as_cur` (`id_cur`);

--
-- Filtros para la tabla `a_inv`
--
ALTER TABLE `a_inv`
  ADD CONSTRAINT `fk_a_inv_fk_des_pay_met` FOREIGN KEY (`fk_des_pay_met`) REFERENCES `as_pay_met` (`id_pay_met`),
  ADD CONSTRAINT `fk_a_inv_fk_lst_etl_log` FOREIGN KEY (`fk_lst_etl_log`) REFERENCES `a_etl_log` (`id_etl_log`),
  ADD CONSTRAINT `fk_a_inv_fk_src_cus` FOREIGN KEY (`fk_src_cus`) REFERENCES `au_cus` (`id_cus`),
  ADD CONSTRAINT `fk_a_inv_fk_src_fin_cur` FOREIGN KEY (`fk_src_fin_cur`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_a_inv_fk_src_ori_cur` FOREIGN KEY (`fk_src_ori_cur`) REFERENCES `as_cur` (`id_cur`),
  ADD CONSTRAINT `fk_a_inv_fk_src_sal_agt_n` FOREIGN KEY (`fk_src_sal_agt_n`) REFERENCES `au_sal_agt` (`id_sal_agt`),
  ADD CONSTRAINT `fk_a_inv_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_inv_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `a_inv_row`
--
ALTER TABLE `a_inv_row`
  ADD CONSTRAINT `fk_a_inv_row_fk_itm` FOREIGN KEY (`fk_itm`) REFERENCES `au_itm` (`id_itm`),
  ADD CONSTRAINT `fk_a_inv_row_fk_src_fin_uom` FOREIGN KEY (`fk_src_fin_uom`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_a_inv_row_fk_src_ori_uom` FOREIGN KEY (`fk_src_ori_uom`) REFERENCES `as_uom` (`id_uom`),
  ADD CONSTRAINT `fk_a_inv_row_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_inv_row_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_a_inv_row_id_inv` FOREIGN KEY (`id_inv`) REFERENCES `a_inv` (`id_inv`);

--
-- Filtros para la tabla `cs_usr_tp`
--
ALTER TABLE `cs_usr_tp`
  ADD CONSTRAINT `fk_cs_usr_tp_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `cu_usr`
--
ALTER TABLE `cu_usr`
  ADD CONSTRAINT `fk_cu_usr_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_cu_usr_fk_usr_tp` FOREIGN KEY (`fk_usr_tp`) REFERENCES `cs_usr_tp` (`id_usr_tp`),
  ADD CONSTRAINT `fk_cu_usr_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_cu_usr_fk_web_role` FOREIGN KEY (`fk_web_role`) REFERENCES `ss_web_role` (`id_web_role`);

--
-- Filtros para la tabla `c_cfg`
--
ALTER TABLE `c_cfg`
  ADD CONSTRAINT `fk_c_cfg_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_c_cfg_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `c_usr_gui`
--
ALTER TABLE `c_usr_gui`
  ADD CONSTRAINT `fk_c_usr_gui_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_c_usr_gui_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_c_usr_gui_id_usr` FOREIGN KEY (`id_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `ss_shipt_st`
--
ALTER TABLE `ss_shipt_st`
  ADD CONSTRAINT `fk_ss_shipt_st_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `ss_web_role`
--
ALTER TABLE `ss_web_role`
  ADD CONSTRAINT `fk_ss_web_role_fk_usr` FOREIGN KEY (`fk_usr`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_cargo_tp`
--
ALTER TABLE `su_cargo_tp`
  ADD CONSTRAINT `fk_su_cargo_tp_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_cargo_tp_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_comment`
--
ALTER TABLE `su_comment`
  ADD CONSTRAINT `fk_su_comment_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_comment_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_destin`
--
ALTER TABLE `su_destin`
  ADD CONSTRAINT `fk_su_destin_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_destin_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_handg_tp`
--
ALTER TABLE `su_handg_tp`
  ADD CONSTRAINT `fk_su_handg_tp_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_handg_tp_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_shipper`
--
ALTER TABLE `su_shipper`
  ADD CONSTRAINT `fk_su_shipper_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_shipper_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_shipt_tp`
--
ALTER TABLE `su_shipt_tp`
  ADD CONSTRAINT `fk_su_shipt_tp_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_shipt_tp_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `su_vehic_tp`
--
ALTER TABLE `su_vehic_tp`
  ADD CONSTRAINT `fk_su_vehic_tp_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_su_vehic_tp_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `s_cfg`
--
ALTER TABLE `s_cfg`
  ADD CONSTRAINT `fk_s_cfg_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_cfg_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `s_evidence`
--
ALTER TABLE `s_evidence`
  ADD CONSTRAINT `fk_s_evidence_fk_ship_ship` FOREIGN KEY (`fk_ship_ship`,`fk_ship_row`) REFERENCES `s_shipt_row` (`id_shipt`, `id_row`),
  ADD CONSTRAINT `fk_s_evidence_fk_usr_accept` FOREIGN KEY (`fk_usr_accept`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_evidence_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_evidence_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_evidence_fk_usr_upload` FOREIGN KEY (`fk_usr_upload`) REFERENCES `cu_usr` (`id_usr`);

--
-- Filtros para la tabla `s_shipt`
--
ALTER TABLE `s_shipt`
  ADD CONSTRAINT `fk_s_shipt_fk_usr_tare` FOREIGN KEY (`fk_usr_tare`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_cargo_tp` FOREIGN KEY (`fk_cargo_tp`) REFERENCES `su_cargo_tp` (`id_cargo_tp`),
  ADD CONSTRAINT `fk_s_shipt_fk_handg_tp` FOREIGN KEY (`fk_handg_tp`) REFERENCES `su_handg_tp` (`id_handg_tp`),
  ADD CONSTRAINT `fk_s_shipt_fk_shipper` FOREIGN KEY (`fk_shipper`) REFERENCES `su_shipper` (`id_shipper`),
  ADD CONSTRAINT `fk_s_shipt_fk_shipt_st` FOREIGN KEY (`fk_shipt_st`) REFERENCES `ss_shipt_st` (`id_shipt_st`),
  ADD CONSTRAINT `fk_s_shipt_fk_shipt_tp` FOREIGN KEY (`fk_shipt_tp`) REFERENCES `su_shipt_tp` (`id_shipt_tp`),
  ADD CONSTRAINT `fk_s_shipt_fk_usr_accept` FOREIGN KEY (`fk_usr_accept`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_usr_ann` FOREIGN KEY (`fk_usr_ann`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_usr_ins` FOREIGN KEY (`fk_usr_ins`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_usr_release` FOREIGN KEY (`fk_usr_release`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_usr_upd` FOREIGN KEY (`fk_usr_upd`) REFERENCES `cu_usr` (`id_usr`),
  ADD CONSTRAINT `fk_s_shipt_fk_vehic_tp` FOREIGN KEY (`fk_vehic_tp`) REFERENCES `su_vehic_tp` (`id_vehic_tp`);

--
-- Filtros para la tabla `s_shipt_row`
--
ALTER TABLE `s_shipt_row`
  ADD CONSTRAINT `fk_s_shipt_row_fk_customer` FOREIGN KEY (`fk_customer`) REFERENCES `au_cus` (`id_cus`),
  ADD CONSTRAINT `fk_s_shipt_row_fk_destin` FOREIGN KEY (`fk_destin`) REFERENCES `su_destin` (`id_destin`),
  ADD CONSTRAINT `fk_s_shipt_row_id_shipt` FOREIGN KEY (`id_shipt`) REFERENCES `s_shipt` (`id_shipt`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

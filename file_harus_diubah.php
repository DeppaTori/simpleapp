<?php

/*

 * F:\xampp\htdocs\keluargaku\silsilah\.env
 * F:\xampp\htdocs\keluargaku\blog\wp-config.php
 * F:\xampp\htdocs\keluargaku\blog\wp-content\plugins\Solata.php
 * F:\xampp\htdocs\keluargaku\silsilah\app\Library\Config.php
 * 
 * 
 *  */

/*
 /// QUERY UPDATe PASANGAN by informasi anak
 * 
CREATE TEMPORARY TABLE IF NOT EXISTS table2 AS (SELECT parent_id,parentayah_id FROM tob_keluarga WHERE parent_id > 0 AND parentayah_id > 0
GROUP BY parent_id,parentayah_id)

SELECT*FROM table2

UPDATE tob_keluarga a
RIGHT JOIN table2 b ON b.parentayah_id = a.keluarga_id
SET a.pasangan = b.parent_id
 * 
 * 
 * 
 *  */

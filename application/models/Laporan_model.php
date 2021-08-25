<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	function get_laporan_pemeriksaan($id_dokter)
	{
		$stat1 = '3';
		$stat2 = '3';
		$this->db->select('*');
		$this->db->from('booking a');
		$this->db->join('rencana b', 'a.id_booking=b.id_booking');
		$this->db->join('pasien c', 'a.id_pasien=c.id_pasien');
		$this->db->join('dokter d', ' a.id_dokter=d.id_dokter');
		$this->db->join('cabang e', 'a.id_cabang=e.id_cabang');
		$this->db->join('rekam_medis f', 'a.id_booking=f.id_booking');
		$this->db->join('login_session g', 'a.id_user=g.id_user');
		$this->db->where('a.status', $stat1);
		$this->db->where('f.status', $stat2);
		$this->db->where('a.id_dokter', $id_dokter);
		return $this->db->get();
	}

	function get_fee_dokter($id_dokter)
	{
		$sql = $this->db->query('SELECT d.nama_dokter, b.id_dokter, rm.tanggal_periksa, SUM(rm.grandtotal) AS total_pendapatan, 
		SUM(
			CASE 
				WHEN rm.grandtotal = 0 THEN 0
				ELSE FLOOR(((rm.grandtotal * d.sharingfee_pers) / 100))
			END
		) AS total_pendapatan_fee
		FROM rekam_medis rm
		JOIN booking b ON rm.id_booking = b.id_booking
		JOIN dokter d ON b.id_dokter = d.id_dokter
		WHERE b.id_dokter = "' . $id_dokter . '"
		GROUP BY rm.tanggal_periksa');
		return $sql->result();
	}

	function get_laporan_pendapatan($id_dokter = '')
	{
		$clausa_dokter = '';
		if ($id_dokter != '') {
			$clausa_dokter = 'AND b.id_dokter=' . $id_dokter;
		}
		return $this->db->query('SELECT
		tgl,IFNULL(SUM(u.grandtotal),0)AS money,nama_dokter,spesialis,DAYNAME(tgl) as hari,tanggal_periksa
	FROM
		(
		SELECT
			ADDDATE(
				(
				SELECT
					MIN(DATE(NOW() - INTERVAL 6 DAY))
				FROM
					rekam_medis
			),
			ROW -1
			) AS tgl
		FROM
			(
			SELECT
				@row := @row + 1 AS ROW
			FROM
				(
				SELECT
					0
				UNION ALL
			SELECT
				1
			UNION ALL
		SELECT
			3
		UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
			) t,
			(
			SELECT
				0
			UNION ALL
		SELECT
			1
		UNION ALL
	SELECT
		3
	UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
		) t2,
		(
	SELECT
		@row := 0
	) r
		) n
	WHERE
		n.row <=(
		SELECT
			DATEDIFF(
				MAX(DATE(NOW())),
				MIN(DATE(NOW() - INTERVAL 6 DAY))
			)
		FROM
			rekam_medis
	) + 1
	) dr
	LEFT JOIN 
	(rekam_medis u INNER JOIN rencana r ON u.id_booking=r.id_booking
	 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 ' . $clausa_dokter . ')
	 ON
		dr.tgl = DATE(u.tanggal_periksa)
	GROUP BY
		dr.tgl
   ');
		// $this->db->select('tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('rencana.tanggal_rencana');

		// if ($id_dokter){
		//     $this->db->where('booking.id_dokter', $id_dokter);
		// }

		// return $this->db->get();
	}

	function get_laporan_pendapatan_m($id_dokter = '')
	{
		$clausa_dokter = '';
		if ($id_dokter != '') {
			$clausa_dokter = 'AND b.id_dokter=' . $id_dokter;
		}
		return $this->db->query('SELECT
		tgl as startDate,IFNULL(SUM(u.grandtotal),0)AS money,DAYNAME(tgl) as hari,(tgl+INTERVAL 6 DAY) as endDate,DAYNAME(tgl+INTERVAL 6 DAY) as hari2
	FROM
		(
		SELECT
			ADDDATE(
				(
				SELECT
					MIN(CURDATE() - INTERVAL 8 WEEK)
				FROM
					rekam_medis
			),
			ROW -1
			) AS tgl
		FROM
			(
			SELECT
				@row := @row + 1 AS ROW
			FROM
				(
				SELECT
					0
				UNION ALL
			SELECT
				1
			UNION ALL
		SELECT
			3
		UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
			) t,
			(
			SELECT
				0
			UNION ALL
		SELECT
			1
		UNION ALL
	SELECT
		3
	UNION ALL
	SELECT
		4
	UNION ALL
	SELECT
		5
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		6
	UNION ALL
	SELECT
		7
	UNION ALL
	SELECT
		8
	UNION ALL
	SELECT
		9
		) t2,
		(
	SELECT
		@row := 0
	) r
		) n
	WHERE
		n.row <=(
		SELECT
			DATEDIFF(
				MAX(CURDATE()),
				MIN(CURDATE() - INTERVAL 8 WEEK)
			)
		FROM
			rekam_medis
	) + 1
	) dr
	LEFT JOIN 
	(rekam_medis u INNER JOIN rencana r ON u.id_booking=r.id_booking
	 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 ' . $clausa_dokter . ')
	 ON
		dr.tgl = DATE(u.tanggal_periksa)
	GROUP BY
		YEARWEEK(dr.tgl,1)
ORDER BY tgl ASC LIMIT 8 OFFSET 1');

		// $this->db->select('tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('YEARWEEK(tanggal_periksa)');
		// // $this->db->group_by('rencana.tanggal_rencana');
		// $this->db->order_by('rencana.tanggal_rencana','ASC');
		// $this->db->limit(7);

		// if ($id_dokter){
		//     $this->db->where('booking.id_dokter', $id_dokter);
		// }

		// return $this->db->get();
	}

	function get_laporan_pendapatan_b($id_dokter = '')
	{
		$clausa_dokter = '';
		if ($id_dokter != '') {
			$clausa_dokter = 'AND b.id_dokter=' . $id_dokter;
		}
		return $this->db->query('SELECT
		t1.month as bulan,
		t1.md,t1.year as year,
		coalesce(SUM(t1.amount+t2.amount), 0) AS money
		from
		(
		  select DATE_FORMAT(a.Date,"%b") as month,
		  DATE_FORMAT(a.Date, "%Y-%m") as md,
		  0 as  amount,YEAR(a.Date) as year
		  from (
			select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
			from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		  ) a
		  where a.Date <= NOW() and a.Date >= Date_add(Now(),interval - 12 month)
		  group by md
		)t1
		left join
		(
		  SELECT DATE_FORMAT(tanggal_periksa, "%b") AS month, SUM(grandtotal) as amount ,DATE_FORMAT(tanggal_periksa, "%Y-%m") as md
		  FROM rekam_medis u
			INNER JOIN rencana r ON u.id_booking=r.id_booking
			 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 ' . $clausa_dokter . '
		  and tanggal_periksa <= NOW() and tanggal_periksa >= Date_add(Now(),interval - 12 month)
		  GROUP BY md
		)t2
		on t2.md = t1.md 
		group by t1.md
		order by t1.md LIMIT 12 OFFSET 1');
		// $this->db->select('MONTH(tanggal_periksa) AS bulan,tanggal_periksa, nama_dokter, spesialis, tanggal_rencana,SUM(rekam_medis.grandtotal) AS money, DAYNAME(tanggal_rencana) as hari');
		// $this->db->from('rencana');
		// $this->db->join('rekam_medis','rencana.id_booking= rekam_medis.id_booking');
		// $this->db->join('booking','booking.id_booking= rencana.id_booking');
		// $this->db->join('dokter','dokter.id_dokter= booking.id_dokter');
		// $this->db->where('rekam_medis.status',3);
		// $this->db->where('booking.status',3);
		// $this->db->group_by('MONTH(tanggal_periksa)');
		// // $this->db->group_by('rencana.tanggal_rencana');
		// $this->db->order_by('rencana.tanggal_rencana','ASC');
		// $this->db->limit(30);

		// if ($id_dokter){
		//     $this->db->where('booking.id_dokter', $id_dokter);
		// }

		// return $this->db->get();
	}
	
	function get_laporan_pendapatan_t($id_dokter = '')
	{
		$clausa_dokter = '';
		if ($id_dokter != '') {
			$clausa_dokter = 'AND b.id_dokter=' . $id_dokter;
		}
		return $this->db->query('SELECT
		t1.year as tahun,
		t1.md,
		coalesce(SUM(t1.amount+t2.amount), 0) AS money
		from
		(
		  select DATE_FORMAT(a.Date,"%Y") as year,
		  DATE_FORMAT(a.Date, "%Y") as md,
		  0 as  amount
		  from (
			select curdate() - INTERVAL (12*(a.a + (10 * b.a) + (100 * c.a))) DAY as Date
			from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
			cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
		  ) a
		  where a.Date <= NOW() and a.Date >= Date_add(Now(),interval - 12 year)
		  group by md
		)t1
		left join
		(
		  SELECT DATE_FORMAT(tanggal_periksa, "%Y") AS year, SUM(grandtotal) as amount ,DATE_FORMAT(tanggal_periksa, "%Y") as md
		  FROM rekam_medis u
			INNER JOIN rencana r ON u.id_booking=r.id_booking
			 INNER JOIN booking b ON b.id_booking=u.id_booking INNER JOIN dokter d ON d.id_dokter=b.id_dokter AND u.status=3 AND b.status=3 ' . $clausa_dokter . '
		  and tanggal_periksa <= NOW() and tanggal_periksa >= Date_add(Now(),interval - 12 year)
		  GROUP BY md
		)t2
		on t2.md = t1.md 
		group by t1.md
		order by t1.md LIMIT 12 OFFSET 1');
	}
}

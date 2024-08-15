<?php 
namespace App\Models;

use CodeIgniter\Model;

class SeferModel extends Model
{
    protected $table = 'sefer';
    protected $primaryKey = 'SeferID';
    protected $allowedFields = ['SeferID', 'KalkisSehri', 'VarisSehri', 'OtobusIsim', 'KoltukSayisi', 'KalkisSaat', 'VarisSaat','Durum'];

    public function getAllSefer()
    {
        $query = $this->db->query('SELECT 
                                S.ID AS SeferID, 
                                KSehir.Sehir AS KalkisSehri, 
                                VSehir.Sehir AS VarisSehri, 
                                OTOBUS.Isim AS OtobusIsim,
                                OTOBUS.KoltukSayisi AS KoltukSayisi,
                                S.KalkisSaat, 
                                S.VarisSaat, 
                                S.Fiyat, 
                                CASE 
                                    WHEN S.Aktif = 1 THEN \'Aktif\' 
                                    ELSE \'Pasif\' 
                                END AS Durum 
                            FROM 
                                SEFER S
                            INNER JOIN 
                                SEHIR KSehir ON S.KalkisSehirID = KSehir.ID
                            INNER JOIN 
                                SEHIR VSehir ON S.VarisSehirID = VSehir.ID
                            INNER JOIN 
                                OTOBUS ON S.OtobusID = OTOBUS.ID;');
        return $query->getResultArray();
    }

    public function getTekSefer($id)
    {
        $query = $this->db->query('SELECT 
                                S.ID AS SeferID, 
                                KSehir.Sehir AS KalkisSehri, 
                                VSehir.Sehir AS VarisSehri, 
                                OTOBUS.Isim AS OtobusIsim,
                                OTOBUS.Plaka AS OtobusPlaka,
                                OTOBUS.KoltukSayisi AS KoltukSayisi,
                                S.KalkisSaat, 
                                S.VarisSaat, 
                                S.Fiyat, 
                                CASE 
                                    WHEN S.Aktif = 1 THEN \'Aktif\' 
                                    ELSE \'Pasif\' 
                                END AS Durum 
                            FROM 
                                SEFER S
                            INNER JOIN 
                                SEHIR KSehir ON S.KalkisSehirID = KSehir.ID
                            INNER JOIN 
                                SEHIR VSehir ON S.VarisSehirID = VSehir.ID
                            INNER JOIN 
                                OTOBUS ON S.OtobusID = OTOBUS.ID
                            WHERE 
                                S.ID = ?;',array($id));
        return $query->getRowArray();
    }

    public function getSehirSefer($sehir1,$sehir2)
    {
        $query = $this->db->query('SELECT 
                                S.ID AS SeferID, 
                                KSehir.Sehir AS KalkisSehri, 
                                VSehir.Sehir AS VarisSehri, 
                                OTOBUS.Isim AS OtobusIsim,
                                OTOBUS.KoltukSayisi AS KoltukSayisi,
                                S.KalkisSaat, 
                                S.VarisSaat, 
                                S.Fiyat, 
                                CASE 
                                    WHEN S.Aktif = 1 THEN \'Aktif\' 
                                    ELSE \'Pasif\' 
                                END AS Durum 
                            FROM 
                                SEFER S
                            INNER JOIN 
                                SEHIR KSehir ON S.KalkisSehirID = KSehir.ID
                            INNER JOIN 
                                SEHIR VSehir ON S.VarisSehirID = VSehir.ID
                            INNER JOIN 
                                OTOBUS ON S.OtobusID = OTOBUS.ID
                            WHERE 
                                KSehir.Sehir = ? and VSehir.Sehir = ? ;',array($sehir1,$sehir2));
        return $query->getResultArray();
    }

    public function getPNR($plaka,$tarih,$seferID,$OOOS)
    {
        $query1 = $this->db->query('SET @plaka := "'.$plaka.'"');
        $query2 = $this->db->query('SET @satis_zamani := "'.$tarih.'"');
        $query3 = $this->db->query('SET @sefer_id = "'.$seferID.'"');
        $query4 = $this->db->query('SET @OOOS = "'.$OOOS.'"');
        
        $query = $this->db->query('
                                    SELECT CONCAT(
                                        (SELECT SUBSTRING(SehirKodu, 1, 2) FROM SEHIR WHERE ID = SEFER.KalkisSehirID),
                                        @OOOS, 
                                        DATE_FORMAT(@satis_zamani, "%d%m%Y%H%i%s"), 
                                        (SELECT Peron FROM SEHIR WHERE ID = SEFER.VarisSehirID),
                                        @plaka 
                                    ) AS PNR
                                    FROM SEFER
                                    WHERE ID = @sefer_id;
                            ');
        return $query->getResultArray();
    }

    public function rezerveBiletOlustur($PNR,$KullaniciID,$SeferID,$KoltukNo,$BiletTur,$BiletUcret,$SeferTarih)
    {
        $query = $this->db->query('
                                    INSERT INTO BILET (PNR,KullaniciID,SeferID,KoltukNo,BiletTur,BiletUcret,Tarih)
                                    VALUES (?,?,?,?,?,?,?);
                            ',array($PNR,$KullaniciID,$SeferID,$KoltukNo,$BiletTur,$BiletUcret,$SeferTarih));
    }
   
}
?>
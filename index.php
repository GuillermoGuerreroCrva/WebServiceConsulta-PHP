<?php

    include 'conexion.php';
    include 'ConsultarWebService.php';
    include 'Parametros.php';

    //1 Fecha
    //$fechaMain='2015-04-24 17:14:50';

    $pdo = new Conexion();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['hreal'])) {

            $sql = $pdo->prepare("SELECT unidad,tarjeta, uid, montoa, saldoant, vercontrol, recibo, tipo, linea, momento
            FROM monterrey.tarjetas WHERE hreal = :hreal");
            $sql->bindValue(':hreal', $_GET['hreal']);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sql->fetchAll());
            exit();
        } else {
            $sql = $pdo->prepare("SELECT * FROM monterrey.tarjetas");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sql->fetchAll());
            exit();
        }
    }


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sql = "INSERT INTO monterrey.tarjetas (unidad, tarjeta, montoa, horatr, recibo, tipo, linea, momento, ccveoper, economico, hreal, lat, lon, oreja, fecins, uid, saldoant, vercontrol, tagmarcada, transbordo, idrutatrans_act, idrutatrans1, idrutatrans2, porcentrans) VALUES (:unidad, :tarjeta, :montoa, :horatr, :recibo, :tipo, :linea, :momento, :ccveoper, :economico, :hreal,
            :lat, :lon, :oreja, :fecins, :uid, :saldoant, :vercontrol, :tagmarcada, :transbordo, :idrutatrans_act, :idrutatrans1, :idrutatrans2, :porcentrans)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':unidad', $_POST['unidad']);
        $stmt->bindValue(':tarjeta', $_POST['tarjeta']);
        $stmt->bindValue(':montoa', $_POST['montoa']);
        $stmt->bindValue(':horatr', $_POST['horatr']);
        $stmt->bindValue(':recibo', $_POST['recibo']);
        $stmt->bindValue(':tipo', $_POST['tipo']);
        $stmt->bindValue(':linea', $_POST['linea']);
        $stmt->bindValue(':momento', $_POST['momento']);
        $stmt->bindValue(':ccveoper', $_POST['ccveoper']);
        $stmt->bindValue(':economico', $_POST['economico']);
        $stmt->bindValue(':hreal', $_POST['hreal']);
        $stmt->bindValue(':lat', $_POST['lat']);
        $stmt->bindValue(':lon', $_POST['lon']);
        $stmt->bindValue(':oreja', $_POST['oreja']);
        $stmt->bindValue(':fecins', $_POST['fecins']);
        $stmt->bindValue(':uid', $_POST['uid']);
        $stmt->bindValue(':saldoant', $_POST['saldoant']);
        $stmt->bindValue(':vercontrol', $_POST['vercontrol']);
        $stmt->bindValue(':tagmarcada', $_POST['tagmarcada']);
        $stmt->bindValue(':transbordo', $_POST['transbordo']);
        $stmt->bindValue(':idrutatrans_act', $_POST['idrutatrans_act']);
        $stmt->bindValue(':idrutatrans1', $_POST['idrutatrans1']);
        $stmt->bindValue(':idrutatrans2', $_POST['idrutatrans2']);
        $stmt->bindValue(':porcentrans', $_POST['porcentrans']);
        $stmt->execute();
        $idPost = $pdo->lastInsertId();
        if ($idPost) {
            header("HTTP/1.1 200 OK");
            echo json_encode($idPost);
            exit(); 
        }
    }
    
?>
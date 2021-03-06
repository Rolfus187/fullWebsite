<?php
  $pdo = new PDO('mysql:host=10.35.47.124:3306;dbname=k86121_dorf', 'k86121_dsauser', 'DasSchwarzeAuge');
  $sql = "SELECT * FROM Arbeiter WHERE Name = '$name'";
  foreach ($pdo->query($sql) as $row) {
    $data = $row;
  }
  $talente = array("Wirtschaft", "Unterhaltung", "Kochen", "Wildnis", "Handwerk", "Schmied", "Baukunst", "Heilkunde");
  $maxval = 0;
  foreach ($talente as $talent) {
    $tmpval = $data[$talent];
    if ($tmpval > $maxval) {
      $maxval = $tmpval;
    }
  }
?>

<?php
echo "<div class='card m-1 p-0 dsacard dsacard-";
if ($maxval < 5) {
  echo "grey";
} elseif ($maxval < 10) {
  echo "green";
} elseif ($maxval < 15) {
  echo "blue";
} elseif ($maxval < 20) {
  echo "purple";
} else {
  echo "yellow";
}
echo "'>";
?>
  <div class="card-body m-3 p-0">
    <div class="container m-0 p-0">
      <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
          <?php
            echo "<div class='dsacard-header dsacard-header-";
            if ($maxval < 5) {
              echo "grey";
            } elseif ($maxval < 10) {
              echo "green";
            } elseif ($maxval < 15) {
              echo "blue";
            } elseif ($maxval < 20) {
              echo "purple";
            } else {
              echo "yellow";
            }
            echo "'>";
            echo $data['Name'];
            echo "</div>";
          ?>
        </div>
      </div>

      <div class="row m-0 p-0">
        <div class="col-6 m-0 p-0">
          <div class="dsacard-image"></div>
          </div>
          <div class="col-6 m-0 p-0">
            <?php
              echo "<div class='dsacard-rasse mx-2 dsacard-rasse-";
              if ($maxval < 5) {
                echo "grey";
              } elseif ($maxval < 10) {
                echo "green";
              } elseif ($maxval < 15) {
                echo "blue";
              } elseif ($maxval < 20) {
                echo "purple";
              } else {
                echo "yellow";
              }
              echo "'>";
              echo $data['Rasse'];
              echo "</div>";
            ?>
            <div class="dsacard-infoblock mx-1">Infos</div>
          </div>
        </div>

        <div class="row p-0 my-2 mx-0">
          <div class="col-6 m-0 p-0 ">
            <?php
              $talente = array("Wirtschaft", "Unterhaltung", "Kochen", "Wildnis");
              foreach ($talente as $talent) {
                echo "<div class='dsacard-talent my-2 mr-1 ml-0'>";
                echo "<div class='btn-group dsabtn-group'>";
                echo "<button type='button' class='btn btn-light btn-block dsabtn-talent-left'>".$talent."</button>";
                echo "<button type='button' class='btn btn-light dsabtn-talent-right dsabtn-talent-";
                $val = $data[$talent];
                if ($val < 5) {
                  echo "grey";
                } elseif ($val < 10) {
                  echo "green";
                } elseif ($val < 15) {
                  echo "blue";
                } elseif ($val < 20) {
                  echo "purple";
                } else {
                  echo "yellow";
                }
                echo "'>";
                echo strval($val);
                echo "</button>";
                echo "</div>";
                echo "</div>";
              }
            ?>
          </div>
          <div class="col-6 m-0 p-0">
            <?php
              $talente = array("Handwerk", "Schmied", "Baukunst", "Heilkunde");
              foreach ($talente as $talent) {
                echo "<div class='dsacard-talent my-2 ml-1 mr-0'>";
                echo "<div class='btn-group dsabtn-group'>";
                echo "<button type='button' class='btn btn-light btn-block dsabtn-talent-left'>".$talent."</button>";
                echo "<button type='button' class='btn btn-light dsabtn-talent-right dsabtn-talent-";
                $val = $data[$talent];
                if ($val < 5) {
                  echo "grey";
                } elseif ($val < 10) {
                  echo "green";
                } elseif ($val < 15) {
                  echo "blue";
                } elseif ($val < 20) {
                  echo "purple";
                } else {
                  echo "yellow";
                }
                echo "'>";
                echo strval($val);
                echo "</button>";
                echo "</div>";
                echo "</div>";
              }
            ?>
          </div>
        </div>

        <div class="row m-0 p-0">
          <div class="col-12 m-0 p-0">
            <div class="dsacard-potential mx-1">
              Potential:
              <?php
                $used = $data['Potential_used'];
                $unused = $data['Potential'] - $used;
                for ($i = 1; $i <= $used; $i++) {
                  echo '<i class="fas fa-star"></i>';
                }
                for ($i = 1; $i <= $unused; $i++) {
                  echo '<i class="far fa-star"></i>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

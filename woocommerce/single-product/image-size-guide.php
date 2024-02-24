<?php

function setImageSizeModale($data = "")
{
  $data = json_decode($data);
  $thead_group = $data[0];
?>
  <div id="image-size-guide-modal" class="">
    <div class="w-full mr-0 ml-auto">
      <button id="image-size-guide-modal-close" class="p-3 ">
        <i class="stroke-2 text-red-600" data-feather="x"></i>
      </button>
    </div>
    <div class="w-full max-h-full overflow-auto">
      <table id="guide-size" class=" mx-auto">
        <thead>
          <?php foreach ($thead_group as $thead) {
            echo "<th>$thead</th>";
          } ?>
        </thead>
        <tbody>
          <?php
          foreach ($data as $key => $tbody_group) {
            if ($key != 0) {
              echo '<tr>';
              foreach ($tbody_group as $tbody) {
                echo "<td>$tbody</td>";
              }
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<?php
}

<div style="display: flex;justify-content: center">
	<?php

		echo '    <div style="width:200px;border:solid lightgoldenrodyellow;background-color:cadetblue;padding: 2% 10%">';
		echo '        <div>';

		echo '            <p style="font-style: italic">';
		echo '              Spot n° ' . htmlspecialchars($s->getIdSpot());
		echo '            </p>';

        echo '            <p>';
        echo '              Nom : <span style="font-size: x-large">' . htmlspecialchars($s->getNom()) . '</span>';
        echo '            </p>';

        echo '            <p>';
        echo '              Commune : <span style="font-size: x-large">' . htmlspecialchars($s->getCommune()) . '</span>';
        echo '            </p>';

		echo '            <p>';
        echo '              <a href="index.php?action=delete&controller=spot&id_spot=' . rawurlencode($s->getIdSpot()) . '">X' . '</a>' ;
        echo '              <a href="index.php?action=update&controller=spot&id_spot=' . rawurlencode($s->getIdSpot()) . '">maj ' . '</a>' ;
        echo '            </p>';


		echo '    </div>';
		echo '</div>';
	?>
</div>


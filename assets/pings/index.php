<?php
    use xPaw\MinecraftQuery;
    use xPaw\MinecraftQueryException;
    define( 'MQ_SERVER_ADDR', 'ls1.neobyte-network.net' );
    define( 'MQ_SERVER_PORT', 25565 );
    define( 'MQ_TIMEOUT', 1 );
    Error_Reporting( E_ALL | E_STRICT );
    Ini_Set( 'display_errors', true );

    require __DIR__ . '/src/MinecraftQuery.php';
    require __DIR__ . '/src/MinecraftQueryException.php';

    $Timer = MicroTime( true );

    $Query = new MinecraftQuery( );

    try
    {
        $Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
    }
    catch( MinecraftQueryException $e )
    {
        $Exception = $e;
    }

    $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>LS1</title>
</head>

<body>
	 <style type="text/css">
  body {
    color: white;
    background-color: transparent}
  </style>
	<?php if( isset( $Exception ) ): ?>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<?php echo htmlspecialchars( $Exception->getMessage( ) ); ?>
		</div>


		<div class="panel-body">
			<?php echo nl2br( $e->getTraceAsString(), false ); ?>
		</div>
	</div>
	<?php else: ?>

	<table>
		<thead>
		</thead>


		<tbody>
			<?php if( ( $Info = $Query->GetInfo( ) ) !== false ): ?><?php foreach( $Info as $InfoKey => $InfoValue ): ?>

			<tr>
				<td><?php echo htmlspecialchars( $InfoKey ); ?>
				</td>

				<td><?php
				    if( Is_Array( $InfoValue ) )
				    {
				        echo "<pre>";
				        print_r( $InfoValue );
				        echo "</pre>";
				    }
				    else
				    {
				        echo htmlspecialchars( $InfoValue );
				    }
				?>
				</td>
			</tr>
			<?php endforeach; ?><?php else: ?>

			<tr>
				<td colspan="2">No information received</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php endif; ?>
</body>
</html>
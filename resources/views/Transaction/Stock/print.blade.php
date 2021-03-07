<!DOCTYPE html>
<html>
<head>
	<title>Print Stock Report</title>
	<meta name="csrf-token" content={{csrf_token()}}>
	<style>
		table.static
		{
			position : relative;
			border : 1px solid #543535;
		}
	</style>
</head>

<body>
	<div class="form-group">
		<h3 align="center"><b>STOCK REPORT</b></h3>
		<table class="static" align="center" rules="all" border="1px" style="width:95%">
			<tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>

            <br>
            <br>
            <br>

            @foreach($product as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->elektronika_id}}</td>
                <td>{{$data->nama}}</td>
                <td style="font-weight:bold">{{$data->stock_available}}/{{$data->stock_total}}</td>
                <td>{{$data->is_ready}}</td>
            </tr>
             @endforeach
		</table>

	</div>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>

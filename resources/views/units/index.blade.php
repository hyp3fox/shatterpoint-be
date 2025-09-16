<!DOCTYPE html>
<html>
<head>
    <title>All Units</title>
</head>
<body>
    <h1>Unit List</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Image ID</th>
            <th>Unit Name</th>
            <th>Unique Name</th>
            <th>Unit Type</th>
            <th># of Characters</th>
            <th>Era</th>
            <th>Affiliation</th>
            <th>Available Force</th>
            <th>Stamina</th>
            <th>Durability</th>
            <th>Points</th>
            <th>Default Squad</th>
            <th>Owned</th>

        </tr>
        @foreach($units as $unit)
        <tr>
            <td>{{ $unit->id }}</td>
            <td>{{ $unit->image_id }}</td>
            <td>{{ $unit->unit_name }}</td>
            <td>{{ $unit->base_character_name }}</td>
            <td>{{ $unit->unit_type }}</td>
            <td>{{ $unit->num_of_characters }}</td>
            <td>{{ $unit->era }}</td>
            <td>{{ $unit->affiliation }}</td>
            <td>{{ $unit->force_available }}</td>
            <td>{{ $unit->unit_stamina }}</td>
            <td>{{ $unit->unit_durability }}</td>
            <td>{{ $unit->points_value }}</td>
            <td>{{ $unit->default_squad }}</td>
            <td>{{ $unit->is_owned }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

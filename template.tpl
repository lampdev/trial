<html>
<head>
    <style>
        .bold {
            font-weight: bold;
        }
        .floatleft {
            float: left;
        }
        .thumb {
            width: 60px;
        }
        .clear {
            clear: both;
        }
        #members,#members td,#members tr {
            border: 1px solid black;
        }
    </style>
    <title>{$title}</title>
</head>
<body>
    {foreach $results as $team}
        <img class="thumb floatleft" src="{$team['image_url']}"/><h3 class="floatleft">{$team['name']}</h3>
        <br/>
        <span class="desc">
            <span class="bold">Description:</span>{$team['description']}
        </span>
        <br/>
        <span class="memberscaption">
            <span class="bold">Members:</span>
        </span>
        <table id="members">
            <thead>
                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Years Experience in FE</th>
                <th>Years Experience in BE</th>
                <th>Years Experience in DB</th>
                <th>Years Experience in Sys</th>
                <th>Github profile</th>
            </thead>
            {foreach $team['members'] as $member}
                <tr>
                    <td>
                        <img class="thumb floatleft" src="{$member['image_url']}"/>
                    </td>
                    <td>{$member['name']}</td>
                    <td>{$member['description']}</td>
                    <td>{$member['years_exp_fe']}</td>
                    <td>{$member['years_exp_be']}</td>
                    <td>{$member['years_exp_db']}</td>
                    <td>{$member['years_exp_sys']}</td>
                    <td><a href="{$member['github_url']}">{$member['github_url']}</a></td>
                </tr>
            {/foreach}
        </table>
        <br/>
    {/foreach}
</body>
</html>
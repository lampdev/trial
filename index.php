<?php
// db connection is in init.php. As well as connection params (TODO: move to config)
require_once(realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'init.php'));

$sqlBuilder =  new \Simplon\Mysql\Manager\SqlQueryBuilder();

// getting all the data from teams, teammembers and their avatars
$sqlBuilder->setQuery('SELECT `teams`.`name` AS `team_name`, `teams`.`description` as `team_description`,`teams`.`rating` as `team_rating`, `team_images`.`url` as `team_image_url`, `teammembers`.*, `member_images`.`url` as `member_image_url`
                       FROM `teams`
                       INNER JOIN `teammembers` ON `teams`.`id` = `teammembers`.`team_id`
                       INNER JOIN `images` `team_images` on `team_images`.`id` = `teams`.`image_id`
                       INNER JOIN `images` `member_images` on `member_images`.`id` = `teammembers`.`image_id`');
$rows = $sqlManager->fetchRowManyCursor($sqlBuilder);

$results = array();
foreach($rows as $row) {
    if(!array_key_exists($row['team_id'], $results)) {
        // if this is "new" team, initialize it
        $results[$row['team_id']] = array('name' => $row['team_name'],
                                      'description' => $row['team_description'],
                                      'rating' => $row['team_rating'],
                                      'image_url' => $row['team_image_url'],
                                      'members' => array());
    }
    //append every member
    $results[$row['team_id']]['members'][] = array('name' => $row['name'],
                                              'description' => $row['description'],
                                              'years_exp_fe' => $row['years_exp_fe'],
                                              'years_exp_be' => $row['years_exp_be'],
                                              'years_exp_db' => $row['years_exp_db'],
                                              'years_exp_sys' => $row['years_exp_sys'],
                                              'github_url' => $row['github_url'],
                                              'image_url' => $row['member_image_url']);
}

// initialize Smarty
$smarty = new Smarty();
// assign the results to template
$smarty->assign('results',$results);

//// PDF Generation
$mpdf = new mPDF();
$mpdf->WriteHTML($smarty->fetch('template.tpl'));

$mpdf->Output('output.pdf');
<?php
require_once(realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'init.php'));

define('TEAM_NUMBER',20);
define('TEAM_MEMBER_MAX_NUMBER',20);

$sqlBuilder =  new \Simplon\Mysql\Manager\SqlQueryBuilder();

$sqlBuilder->setQuery('SELECT COUNT(*) FROM `images`');

$imageCount = $sqlManager->fetchColumn($sqlBuilder);

//teams generation
for($i = 0; $i < TEAM_NUMBER; $i++) {
    $sqlBuilder->setQuery('SELECT * FROM `images`
                           LIMIT 1 OFFSET :offset')
               ->setConditions(array('offset' => rand(1,$imageCount - 1)));
    $rowImage = $sqlManager->fetchRow($sqlBuilder);
    
    $data = array(
        'name' => 'Team ' . ($i + 1),
        'description'  => 'Team ' . ($i + 1) . ' description',
        'rating' => rand(0,500) / 100,
        'image_id' => $rowImage['id']
    );
    
    $sqlBuilder
        ->setTableName('teams')
        ->setData($data);
        
    $teamId = $sqlManager->insert($sqlBuilder);
    
    // members generation
    $membersCount = rand(1,TEAM_MEMBER_MAX_NUMBER);
    for($j = 0; $j < $membersCount; $j++) {
        $sqlBuilder->setQuery('SELECT * FROM `images`
                               LIMIT 1 OFFSET :offset')
                   ->setConditions(array('offset' => rand(1,$imageCount - 1)));
        $rowImage = $sqlManager->fetchRow($sqlBuilder);

        $data = array(
            'name' => 'Member ' . $j,
            'team_id' => $teamId,
            'description'  => 'Team ' . ($i + 1) . '; member '. ($j + 1) .' description',
            'years_exp_fe' => rand(0,10),
            'years_exp_be' => rand(0,10),
            'years_exp_db' => rand(0,10),
            'years_exp_sys' => rand(0,10),
            'github_url' => 'https://github.com/' . substr(str_shuffle(implode('',array_merge(range('a','z'),range(0,9)))), 0, 8),
            'image_id' => $rowImage['id']
        );
        
        $sqlBuilder
            ->setTableName('teammembers')
            ->setData($data);
            
        $teamMemberId = $sqlManager->insert($sqlBuilder);
    }
}
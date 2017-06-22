<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('หน้าแรก', route('index'));
});

Breadcrumbs::register('activity', function($breadcrumbs,$activity_categories)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('กิจกรรมทั้งหมด', route('activities.index',$activity_categories));
});

Breadcrumbs::register('activity_show', function($breadcrumbs,$activity_categories,$activity)
{
    $breadcrumbs->parent('activity',$activity_categories);

    $breadcrumbs->push($activity->title);
});
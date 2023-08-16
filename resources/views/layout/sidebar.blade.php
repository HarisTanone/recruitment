<?php
$sidebar = [
    [
        'url' => '/home',
        'icon' => 'tim-icons icon-chart-pie-36',
        'text' => 'Dashboard',
    ],
    [
        'url' => '#',
        'icon' => 'tim-icons icon-single-02',
        'text' => 'Data Kandidat',
    ],
    [
        'url' => '/admin/job',
        'icon' => 'tim-icons icon-single-copy-04',
        'text' => 'Data Lowongan',
    ],
];
$url = url()->current();
$path = parse_url($url, PHP_URL_PATH);
?>

<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            {{-- <li class="active">
                <a href="/home">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Data Kandidat</p>
                </a>
            </li>
            <li>
                <a href="/admin/job">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>Data Lowongan</p>
                </a>
            </li> --}}
            <?php foreach ($sidebar as $s) {?>
            <li class="<?php echo $s['url'] == $path ? 'active' : ''?>">
                <a href="<?php echo $s['url']; ?>">
                    <i class="<?php echo $s['icon']; ?>"></i>
                    <p><?php echo $s['text']; ?></p>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>

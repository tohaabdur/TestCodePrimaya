<div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
    <?PHP foreach($menu_list as $menu){ ?>
    <div class="col col-3">
        <div class="card mb-3 rounded-3 shadow-sm" style="background-color:<?PHP echo $menu->Color;?>;">
            <div class="card-header py-3">
                <div class="text-center">
                    <img src="<?PHP echo base_url('assets/images/icon/'.$menu->Icon);?>" class="rounded" alt="<?PHP echo $menu->Title;?>" height="160px" >
                </div>
            </div>
            <div class="card-body">
                <a class="w-100 btn bg-fade" href="<?PHP echo base_url('index.php/'.$menu->URL);?>"><?PHP echo $menu->Title;?></a>
            </div>
        </div>
    </div>
    <?PHP } ?>
</div>
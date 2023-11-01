<style>
    .btn-mystyle {
        color: #fff;
        background-color: #5E825E;
        border-color: #4cae4c;
    }

    .newlog {
        width: 800px;
        vertical-align: bottom;
    }

    #text_content {
        width: 500px;
        height: 100px;
    }

    .pl_t {
        border-bottom: 3px double blue;
        font-size: 30px;
        font-family: DFKai-sb;
        font-weight: bolder;
        color: blue;
    }

    .date_set {
        width: 100px;
    }

    input {
        color: black;
        font-size: larger;
    }

    #today_leng_total {
        background-color: #9fd49f;
        color: black;
        font-size: 20px;
    }

    .line_5_style {
        background-color: #CEFFCE;
    }

    .lv3_remark2 {
        width: 99%;
        font-family: 標楷體;
        font-size: 20px;
        color: blue;
        min-height: 25px;
        height: auto;
    }

    .Remark2Edit {
        width: 99%;
        font-family: 標楷體;
        font-size: 20px;
        color: blue;
        min-height: 25px;
        height: auto;
    }

    .Remark2Edit:hover {
        background-color: #CCDDFF;

    }
</style>

<div>
    <ul class="list-inline">
        <li class=" col-md-2">
            <span class="pl_t musPick"><?=$page_title ?></span>
        </li>
    </ul>
    <div id="toolbar" class="list-inline">
        <a class="btn btn-mystyle" href="#addModal" data-toggle="modal">新增</a>
    </div>
    <table id="phoneBook_tab" data-toggle="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-columns="true"
        data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true"
        data-url="<?=base_url('phoneBook/get_phoneBook_list')?>" data-page-list="[10, 20, 25 , 50, 100, ALL]" data-side-pagination="server"
        data-show-footer="false" data-row-style="rowStyle" style="width:1240px">
        <thead>

            <tr>
                <th data-field='NO' data-width='10' data-visible="false" data-sortable="true">id</th>
                <th data-field='unit' data-width='100' data-sortable="true" data-formatter="NameFormatter" data-events="NameEvents">單位</th>
                <th data-field='name' data-width='100' data-sortable="true" data-formatter="NameFormatter" data-events="NameEvents">姓名</th>
                <th data-field='phone' data-width='100'>電話</th>
                <th data-field='cellphone' data-width='110' data-formatter="">手機</th>
                <th data-field='OrderDate' data-width='110' data-sortable="true" data-formatter="OrderFormatter" data-events="OrderEvents">排序日期</th>

                <th data-formatter="OtherFormatter" data-events="OtherEvents" data-width='50'>其他</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade " id="dataViewModal" tabindex="-1" role="dialog" aria-labelledby="dataViewModalLabel" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body clearfix">
                <div class="form-group col-md-12">
                    <h3 class="modal-title col-md-3" data-view="name" style="color: blue">名片</h3>
                    <h3 class="col-md-9" data-view="phone" style="color: red">
                    </h3>
                </div>
                <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">分類</label>
                    <div class="col-md-9" data-view="class">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">E-mail</label>
                    <div class="col-md-9" data-view="mail">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">傳真</label>
                    <div class="col-md-9" data-view="fax">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">電話2</label>
                    <div class="col-md-9" data-view="phone2">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">住址</label>
                    <div class="col-md-9" data-view="address">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-label">單位</label>
                    <div class="col-md-9" data-view="unit">
                    </div>
                </div>
                <!-- <div class="form-group col-md-12" >
                            <div class="col-md-10">
    
                                 <button type="submit"  id="save" class="btn btn-mystyle" >新增</button>
                            </div>
                        </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">新增</h4>
            </div>
            <div class="modal-body clearfix">
                <form action="<?=base_url('/phoneBook/create_phone')?>" method="post" accept-charset="utf-8" id="new_data_frm">
                    <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">單位</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="unit" style="width:100px">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">姓名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">分類</label>
                        <div class="col-md-9">
                            <select class="form-control" name="class" style="width:100%" >
                                <?php
                                    foreach ($book_class as  $key => $value) {
                                        echo "<option value='".$value["name"]."'>".$value["name"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">手機</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="cellphone" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">電話1</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">電話2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone2" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">傳真</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="fax" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">E-mail</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="mail" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">住址</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-10">

                            <button type="submit" id="save" class="btn btn-mystyle">新增</button>
                        </div>
                        <div class="col-md-6">
                            <div id="register_error" class="msg"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">更新</h4>
            </div>
            <div class="modal-body clearfix">
                <form action="<?=base_url('/phoneBook/update_phone')?>" method="post" accept-charset="utf-8" id="edit_data_frm">
                    <!--<form  method="post" accept-charset="utf-8" id="edit_frm">-->
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">單位</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="unit" style="width:100px">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">姓名</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name"  style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">分類</label>
                        <div class="col-md-9">
                            <select class="form-control" name="class" style="width:100%" >
                                <?php
                                    foreach ($book_class as  $key => $value) {
                                        echo "<option value='".$value["name"]."'>".$value["name"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">手機</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="cellphone"  style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">電話1</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone"  style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">電話2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone2"  style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">傳真</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="fax"  style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">E-mail</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="mail" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-label">住址</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" style="width:100%" />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-10">
                            <input type="hidden" name="NO">

                            <button type="submit" id="save" class="btn btn-mystyle">更新</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div style="display: none">
<form method="POST" action="<?=base_url('phoneBook/del_phoneBook')?>" id="del_data_frm">
<input type="hidden" name="NO">
</form>
</div>
<script>

    $BStable = $("#phoneBook_tab");
    function NameFormatter(value, row, index) {
        var tmp_str = "";
        tmp_str += '<a class="DataView" href="#dataViewModal" data-toggle="modal" >' + value + '</a>';
        return [
            tmp_str
        ].join('');
    }
    window.NameEvents = {
        'click .DataView': function (e, value, row, index) {
            $('[data-view="class"]').html(row.class)
            $('[data-view="mail"]').html(row.mail)
            $('[data-view="fax"]').html(row.fax)
            $('[data-view="phone2"]').html(row.phone2)
            $('[data-view="address"]').html(row.address)
            $('[data-view="unit"]').html(row.unit)
            $('[data-view="name"]').html(row.name)
            $('[data-view="phone"]').html(row.cellphone + "<br>" + row.phone)
        }
    };



    function OrderFormatter(value, row, index) {
        var tmp_str = "";
        tmp_str += '<span class="DateUp musPick" style="color : blue" >' + value + '</span>';
        return [
            tmp_str
        ].join('');
    }
    window.OrderEvents = {
        'click .DateUp': function (e, value, row, index) {
            stn_data = { NO: row.NO };
            $.ajax({
                url: base_url + "phoneBook/update_orderdate",
                type: "POST",
                dataType: "JSON",
                data: stn_data,
                success: function () {
                    $BStable.bootstrapTable('refresh');
                },
                error: function () {
                    alert("error");
                }

            })
        }
    };

    function OtherFormatter(value, row, index) {
        var tmp_str = "";
        tmp_str += "<a href='#editModal' data-toggle='modal' class='editData glyphicon glyphicon-pencil'></a>";
        tmp_str += "<a class='delData glyphicon glyphicon-remove'></a>";
        return [
            tmp_str
        ].join('');
    }
    window.OtherEvents = {
        'click .editData': function (e, value, row, index) {
            $('#edit_data_frm [name="class"]').val(row.class)
            $('#edit_data_frm [name="mail"]').val(row.mail)
            $('#edit_data_frm [name="fax"]').val(row.fax)
            $('#edit_data_frm [name="phone2"]').val(row.phone2)
            $('#edit_data_frm [name="address"]').val(row.address)
            $('#edit_data_frm [name="unit"]').val(row.unit)
            $('#edit_data_frm [name="name"]').val(row.name)
            $('#edit_data_frm [name="phone"]').val( row.phone)
            $('#edit_data_frm [name="cellphone"]').val( row.cellphone)
            $('#edit_data_frm [name="NO"]').val( row.NO)
            $('#edit_data_frm [name="class"]').val( row.class)
        },
        'click .delData': function (e, value, row, index) {
            if(confirm("確認是否刪除")){
                $("#del_data_frm [name=NO]").val(row.NO);
                $("#del_data_frm").submit();
            }
        } 
    };


</script>
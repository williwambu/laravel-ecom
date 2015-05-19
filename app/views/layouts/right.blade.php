<!-- right panel --->
    <div class="col-md-3 right clear-padding .hidden-sm .hidden-xs">
        <!-- find photocopier -->
        <div class="col-md-12">
            <div class="row find-copier">
                <div class="col-md-12 find-section ">
                    <h4>Find Photocopier</h4>

                    <form class="find-photocopier" method="GET" action="{{action('filterPhotocopiers')}}">
                        <div class="form-group">
                            <label class="label" for="photocopy-manufacturer">Manufacturer</label>
                            <select name="manufacturer" id="photocopy-manufacturer" class="form-control">
                                <option  value="all" title="0">All</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}" title="{{$manufacturer->manufacturer_name}}">{{$manufacturer->manufacturer_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label" for="photocopy-speed">By Speed</label>
                            <select name="speed" id="photocopy-speed" class="form-control">
                                <option value="all">All</option>
                                <option value="15cpm">15cpm</option>
                                <option value="16cpm">16cpm</option>
                                <option value="30cpm">30cpm</option>
                                <option value="38cpm">38cpm</option>
                                <option value="45cpm">45cpm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label" for="photocopy-color">By Color</label>
                            <select name="color" id="photocopy-color" class="form-control">
                                <option value="black">Color</option>
                                <option value="black and white">Black and white</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-find">Find Photocopier</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end find photocopier -->

        <!-- find catridges -->
        <div class="col-md-12 find-copier">
            <div class="row">
                <div class="col-md-12 find-section">
                    <h4>Find Catridge</h4>

                    <form class="find-catridge">
                        <select id="manufacturers" class="form-control">
                            <option value="0" title="0">Choose your manufacturer</option>
                            <option value="all" title="6">All</option>
                            @foreach($manufacturers as $manufacturer)
                                <option value="{{$manufacturer->id}}" title="{{$manufacturer->manufacturer_name}}">{{$manufacturer->manufacturer_name}}</option>
                            @endforeach
                        </select>
                        <select id="models" class="form-control">
                            <option value="0">Choose your Series</option>
                            <option value="797">CLP</option>
                            <option value="67">CLX</option>
                            <option value="68">ML</option>
                            <option value="69">SCX</option>
                            <option value="1754">Xpress</option>
                        </select>
                        <select id="compatibility_id" class="form-control">
                            <option value="0">Choose your Model</option>
                            <option value="798">300</option>
                            <option value="1664">310</option>
                            <option value="1666">315</option>
                            <option value="1665">315W</option>
                            <option value="1682">320</option>
                            <option value="1683">320N</option>
                            <option value="1684">325</option>
                            <option value="1685">325W</option>
                        </select>
                        <button type="submit" class="btn btn-find">Find Catridges</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end find catridges -->

        <!-- payments pr -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1 lipa">
                <p>Payments are taken securely via </p>
                {{HTML::image('img/lipa.png','lipa na mpesa',array('class'=>'img-responsive'))}}
            </div>
        </div>
        <!-- end payments pr -->
    </div>
    <!-- end right panel -->
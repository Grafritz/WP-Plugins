<?php
function formulaireMesse( $atts ) {
    if ( isset( $_POST['gg'] ) ) {
        $post = array(
            'post_content' => $_POST['content'], 
            'post_title'   => $_POST['title']
        );
        //$id = wp_insert_post( $post, $wp_error );
        print_r($post);
    }
    ?> 
    <form method = "post">
        <input type="text" name="title">
        <input type="text" name="content">
        <input type="submit" name="gg">
        
        <div class="panel panel-default panel-body">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Civilité</label>
                        <input type="text" id="example-email22" name="example-email22" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="simpleinput">Text</label>
                    <input type="text" id="simpleinput" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="example-email">Email</label>
                    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <label for="example-password">Password</label>
                    <input type="password" id="example-password" class="form-control" value="password">
                </div>
                
                <div class="form-group">
                    <label for="example-palaceholder">Placeholder</label>
                    <input type="text" id="example-palaceholder" class="form-control" placeholder="placeholder">
                </div>
                
                <div class="form-group">
                    <label for="example-textarea">Text area</label>
                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="example-readonly">Readonly</label>
                    <input type="text" id="example-readonly" class="form-control" readonly="" value="Readonly value">
                </div>
                
                <div class="form-group">
                    <label for="example-disable">Disabled</label>
                    <input type="text" class="form-control" id="example-disable" disabled="" value="Disabled value">
                </div>
                
                <div class="form-group">
                    <label for="example-static">Static control</label>
                    <input type="text" readonly class="form-control-plaintext" id="example-static" value="email@example.com">
                </div>
                
                <div class="form-group">
                    <label for="example-helping">Helping text</label>
                    <input type="text" id="example-helping" class="form-control" placeholder="Helping text">
                    <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                </div>
                
                <div class="form-group">
                    <label for="example-select">Input Select</label>
                    <select class="form-control" id="example-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="example-multiselect">Multiple Select</label>
                    <select id="example-multiselect" multiple class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="example-fileinput">Default file input</label>
                    <input type="file" id="example-fileinput" class="form-control-file">
                </div>
                
                <div class="form-group">
                    <label for="example-date">Date</label>
                    <input class="form-control" id="example-date" type="date" name="date">
                </div>
                
                <div class="form-group">
                    <label for="example-month">Month</label>
                    <input class="form-control" id="example-month" type="month" name="month">
                </div>
                
                <div class="form-group">
                    <label for="example-time">Time</label>
                    <input class="form-control" id="example-time" type="time" name="time">
                </div>
                
                <div class="form-group">
                    <label for="example-week">Week</label>
                    <input class="form-control" id="example-week" type="week" name="week">
                </div>
                
                <div class="form-group">
                    <label for="example-number">Number</label>
                    <input class="form-control" id="example-number" type="number" name="number">
                </div>
            </div>
        </div>
    </form>
    <?php
}
//add_shortcode( 'formDemandeDeMesse', 'formulaireMesse' ); 
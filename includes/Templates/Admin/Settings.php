<div class="wrap">
    <h1> <?php _e('Settings', JH_SEARCH_TEXT_DOMAIN) ?></h1>

    <form action="" method="POST">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name">Post types</label>
                    </th>
                    <td>
                         <input type="text" name="name" id="name" class="regular-text">               
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="result">Result Container Class</label>
                    </th>
                    <td>
                         <input type="text" name="result" id="result" class="regular-text">               
                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('save_settings'); ?>
        <?php submit_button('Save Settings', 'primary', 'submit-settings'); ?>
    </form>
</div>
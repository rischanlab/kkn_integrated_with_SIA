                
				<form action="<?php echo base_url(); ?>skripsi/login/ceklogin" method="POST">
                    <table>
                        <tr>
                            <td><p><?php echo $warning; ?> </p></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="username"/></td>
                        </tr>
                        <tr> 
                            <td>Password</td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" value=""  onfocus="this.value=''"/></td>
                        </tr>
                        <tr>
                            <td id="button"><input type="submit" value="LOGIN" name="login" /><input type="reset" value="RESET" name="reset" /></td> 
                        </tr> 
                    </table>
                </form>
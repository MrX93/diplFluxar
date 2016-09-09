<table id="admin_tabela" class="table table-striped table-hover table-responsive  table-bordered" >
    <?php
    if (isset($view)):
        switch ($view) {
            case 'korisnici':
                ?>
                <thead>
                    <tr>
                        <th>Ime_prezime</th>
                        <th>nadimak</th>
                        <th>mail</th>
                        <th>sifra</th>
                        <th>slika</th>
                        <th>uloga_id</th>                       
                        <th>vreme_unosa</th>
                        <th>Uneo/Izemnoio</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):
                            $options = array('1' => 'Admin', '2' => 'user',);
                            $attributes = array('id' => 'forma_izmena');
                            $ime_prezime = array('name' => 'ime_prezime', 'id' => 'ime_prezime', 'class' => 'tb_forma_polje', 'value' => $red->ime_prezime, 'form' => 'forma_izmena');
                            $nadimak = array('name' => 'nadimak', 'id' => 'nadimak', 'class' => 'tb_forma_polje', 'value' => $red->nadimak, 'form' => 'forma_izmena');
                            $mail = array('name' => 'mail', 'id' => 'mail', 'class' => 'tb_forma_polje', 'value' => $red->mail, 'form' => 'forma_izmena');
                            $sifra = array('name' => 'sifra', 'id' => 'sifra', 'class' => 'tb_forma_polje', 'value' => $red->sifra, 'form' => 'forma_izmena');
                            $slika = array('name' => 'slika', 'id' => 'slika', 'class' => 'tb_forma_polje', 'value' => $red->slika, 'form' => 'forma_izmena');
                            $uloga_id = array('name' => 'uloga_id', 'id' => 'uloga_id', 'class' => 'tb_forma_polje', 'value' => $red->uloga_id, 'form' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'korisnici', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($ime_prezime); ?></td>
                                <td><?php echo form_input($nadimak); ?></td>
                                <td><?php echo form_input($mail); ?></td>
                                <td><?php echo form_input($sifra); ?></td>
                                <td><?php echo form_input($slika); ?></td>
                                <td><select name="uloga_id" id="uloga_id" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($uloga as $ul) { ?>
                                            <option value="<?php echo $ul->id ?>"><?php echo $ul->naziv_uloge ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->izmenio; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?> "  name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('korisnici');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->ime_prezime; ?></td>
                                <td><?php echo $red->nadimak; ?></td>                                 
                                <td><?php echo $red->mail; ?></td>
                                <td><?php echo $red->sifra; ?></td>
                                <td><?php echo $red->slika; ?></td>
                                <td><?php echo $red->uloga_id; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->izmenio; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('korisnici', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('korisnici', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $options = array('1' => 'Admin', '2' => 'user',);
                        $ime_prezime = array('name' => 'ime_prezime', 'id' => 'ime_prezime', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $nadimak = array('name' => 'nadimak', 'id' => 'nadimak', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $mail = array('name' => 'mail', 'id' => 'mail', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $sifra = array('name' => 'sifra', 'id' => 'sifra', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $slika = array('name' => 'slika', 'id' => 'slika', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $uloga_id = array('name' => 'uloga_id', 'id' => 'uloga_id', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'korisnici', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($ime_prezime); ?></td>
                        <td><?php echo form_input($nadimak); ?></td>
                        <td><?php echo form_input($mail); ?></td>
                        <td><?php echo form_input($sifra); ?></td>
                        <td><?php echo form_input($slika); ?></td>
                        <td><select name="uloga_id" id="uloga_id" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($uloga as $ul) { ?>
                                    <option value="<?php echo $ul->id ?>"><?php echo $ul->naziv_uloge ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button name="dodaj"  class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;

            case 'meni':
                ?>
                <thead>
                    <tr>
                        <th>naziv</th>
                        <th>link</th>
                        <th>podmeni</th>
                        <th>vreme_unosa</th>
                        <th>Uneo/Izemnoio</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):

                            $attributes = array('id' => 'forma_izmena');
                            $naziv = array('name' => 'naziv', 'id' => 'naziv', 'class' => 'tb_forma_polje', 'value' => $red->naziv, 'form' => 'forma_izmena');
                            $link = array('name' => 'link', 'id' => 'link', 'class' => 'tb_forma_polje', 'value' => $red->link, 'form' => 'forma_izmena');
                            $podmeni = array('name' => 'podmeni', 'id' => 'podmeni', 'class' => 'tb_forma_polje', 'value' => $red->podmeni, 'form' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'meni', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($naziv); ?></td>
                                <td><?php echo form_input($link); ?></td>
                                <td><?php echo form_input($podmeni); ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('meni');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv; ?></td>
                                <td><?php echo $red->link; ?></td>
                                <td><?php echo $red->podmeni; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('meni', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('meni', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $naziv = array('name' => 'naziv', 'id' => 'naziv', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $link = array('name' => 'link', 'id' => 'link', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $podmeni = array('name' => 'podmeni', 'id' => 'podmeni', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'meni', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($naziv); ?></td>
                        <td><?php echo form_input($link); ?></td>
                        <td><?php echo form_input($podmeni); ?></td>
                        <td>
                            <button name="dodaj"  class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>		
                </tbody>
                <?php
                break;

            case 'uloga':
                ?>
                <thead>
                    <tr>
                        <th>naziv_uloge</th>
                        <th>vreme_unosa</th>
                        <th>izmenio/uneo</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):

                            $attributes = array('id' => 'forma_izmena');
                            $naziv_uloge = array('name' => 'naziv_uloge', 'id' => 'naziv_uloge', 'class' => 'tb_forma_polje', 'value' => $red->naziv_uloge, 'form' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'uloga', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($naziv_uloge); ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('uloga');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv_uloge; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td> 
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('uloga', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('uloga', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $naziv_uloge = array('name' => 'naziv_uloge', 'id' => 'naziv_uloge', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'uloga', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($naziv_uloge); ?></td>
                        <td>
                            <button name="dodaj" class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;

            case 'zanr':
                ?>
                <thead>
                    <tr>
                        <th>naziv_zanra</th>
                        <th>vreme_unosa</th>
                        <th>izmenio/uneo</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):

                            $attributes = array('id' => 'forma_izmena');
                            $naziv_zanra = array('name' => 'naziv_zanra', 'id' => 'naziv_zanra', 'class' => 'tb_forma_polje', 'value' => $red->naziv_zanra, 'form' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'zanr', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($naziv_zanra); ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('zanr');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv_zanra; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td> 
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('zanr', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('zanr', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $naziv_zanra = array('name' => 'naziv_zanra', 'id' => 'naziv_zanra', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'zanr', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($naziv_zanra); ?></td>
                        <td>
                            <button name="dodaj" class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;

            case 'komentar':
                ?>
                <thead>
                    <tr>
                        <th>tekst</th>
                        <th>film</th>
                        <th>vreme_unosa</th>
                        <th>Uneo/Izemnoio</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):

                            $attributes = array('id' => 'forma_izmena');
                            $tekst = array('name' => 'tekst', 'id' => 'tekst', 'class' => 'tb_forma_polje', 'value' => $red->tekst, 'form' => 'forma_izmena');

                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'komentar', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($tekst); ?></td>
                                <td><?php echo $red->id_film; ?></td>
                                <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <td><?php echo $red->nadimak; ?></td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('komentar');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->tekst; ?></td>
                                <td><?php echo $red->id_film; ?></td>
                                <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <td><?php echo $red->nadimak; ?></td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('komentar', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('komentar', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $tekst = array('name' => 'tekst', 'id' => 'tekst', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');

                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'komentar', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($tekst); ?></td>
                        <td><select name="id_film" id="id_film" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($film as $fi) { ?>
                                    <option value="<?php echo $fi->id ?>"><?php echo $fi->naziv ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button name="dodaj"  class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>		
                </tbody>
                <?php
                break;

            case 'glumci':
                ?>
                <thead>
                    <tr>
                        <th>ime</th>
                        <th>slika glumca</th>
                        <th>link imdb</th>
                        <th>izmenio/uneo</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):

                            $attributes = array('id' => 'forma_izmena');
                            $ime = array('name' => 'ime', 'id' => 'ime', 'class' => 'tb_forma_polje', 'value' => $red->ime, 'form' => 'forma_izmena');
                            $slika_glumca = array('name' => 'slika_glumca', 'id' => 'slika_glumca', 'class' => 'tb_forma_polje', 'value' => $red->slika_glumca, 'form' => 'forma_izmena');
                            $link_imdb = array('name' => 'link_imdb', 'id' => 'link_imdb', 'class' => 'tb_forma_polje', 'value' => $red->link_imdb, 'form' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'glumci', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($ime); ?></td>
                                <td><?php echo form_input($slika_glumca); ?></td>
                                <td><?php echo form_input($link_imdb); ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('glumci');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->ime; ?></td>
                                <td><?php echo $red->slika_glumca; ?></td>
                                <td><?php echo $red->link_imdb; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->nadimak; ?></td>
                                <?php } ?>
                                <td> 
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('glumci', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('glumci', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $ime = array('name' => 'ime', 'id' => 'ime', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $slika_glumca = array('name' => 'slika_glumca', 'id' => 'slika_glumca', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $link_imdb = array('name' => 'link_imdb', 'id' => 'link_imdb', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'glumci', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($ime); ?></td>
                        <td><?php echo form_input($slika_glumca); ?></td>
                        <td><?php echo form_input($link_imdb); ?></td>
                        <td>
                            <button name="dodaj" class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;

            case 'film':
                ?>
                <thead>
                    <tr>
                        <th>naziv</th>
                        <th>slika</th>
                        <th>godina_nastanka</th>
                        <th>imdb_rejting</th>
                        <th>tor_link_720p</th>
                        <th>tor_link_1080p</th>    
                        <th>imdb_link</th> 
                        <th>opis</th> 
                        <th>glavni_zanr</th> 
                        <th>vreme_unosa</th>
                        <th>Uneo/Izemnoio</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kolone as $red) :

                        if (isset($id) && $id == $red->id):
                            $attributes = array('id' => 'forma_izmena');
                            $naziv = array('name' => 'naziv', 'id' => 'naziv', 'class' => 'tb_forma_polje', 'value' => $red->naziv, 'form' => 'forma_izmena');
                            $slika = array('name' => 'slika', 'id' => 'slika', 'class' => 'tb_forma_polje', 'value' => $red->slika, 'form' => 'forma_izmena');
                            $godina_nastanka = array('name' => 'godina_nastanka', 'id' => 'godina_nastanka', 'class' => 'tb_forma_polje', 'value' => $red->godina_nastanka, 'form' => 'forma_izmena');
                            $imdb_rejting = array('name' => 'imdb_rejting', 'id' => 'imdb_rejting', 'class' => 'tb_forma_polje', 'value' => $red->imdb_rejting, 'form' => 'forma_izmena');
                            $tor_link_720p = array('name' => 'tor_link_720p', 'id' => 'tor_link_720p', 'class' => 'tb_forma_polje', 'value' => $red->tor_link_720p, 'form' => 'forma_izmena');
                            $tor_link_1080p = array('name' => 'tor_link_1080p', 'id' => 'tor_link_1080p', 'class' => 'tb_forma_polje', 'value' => $red->tor_link_1080p, 'form' => 'forma_izmena');
                            $imdb_link = array('name' => 'imdb_link', 'id' => 'imdb_link', 'class' => 'tb_forma_polje', 'value' => $red->imdb_link, 'form' => 'forma_izmena');
                            $opis = array('name' => 'opis', 'id' => 'opis', 'class' => 'tb_forma_polje', 'value' => $red->opis, 'form' => 'forma_izmena');

                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'film', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><?php echo form_input($naziv); ?></td>
                                <td><?php echo form_input($slika); ?></td>
                                <td><?php echo form_input($godina_nastanka); ?></td>
                                <td><?php echo form_input($imdb_rejting); ?></td>
                                <td><?php echo form_input($tor_link_720p); ?></td>
                                <td><?php echo form_input($tor_link_1080p); ?></td>
                                <td><?php echo form_input($imdb_link); ?></td>
                                <td><?php echo form_input($opis); ?></td>
                                <td><select name="glavni_zanr" id="glavni_zanr" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($zanr as $za) { ?>
                                            <option value="<?php echo $za->naziv_zanra ?>"><?php echo $za->naziv_zanra ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->korisnik_id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->izmenio; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?> "  name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni(this.id)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('film');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv; ?></td>
                                <td><?php echo $red->slika; ?></td>                                 
                                <td><?php echo $red->godina_nastanka; ?></td>
                                <td><?php echo $red->imdb_rejting; ?></td>
                                <td>have link</td>
                                <td> have link</td>
                                <td><?php echo $red->imdb_link; ?></td>
                                <td>have description</td>
                                <td><?php echo $red->glavni_zanr; ?></td>
                                <?php if ($red->vreme_unosa == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme_unosa); ?></td>
                                <?php } ?>
                                <?php if ($red->id == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->izmenio; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu('film', this.id);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="obrisi" class="admin_dugme" onclick="obrisi_red('film', this.id);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $naziv = array('name' => 'naziv', 'id' => 'naziv', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $slika = array('name' => 'slika', 'id' => 'slika', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $godina_nastanka = array('name' => 'godina_nastanka', 'id' => 'godina_nastanka', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $imdb_rejting = array('name' => 'imdb_rejting', 'id' => 'imdb_rejting', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tor_link_720p = array('name' => 'tor_link_720p', 'id' => 'tor_link_720p', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $tor_link_1080p = array('name' => 'tor_link_1080p', 'id' => 'tor_link_1080p', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $imdb_link = array('name' => 'imdb_link', 'id' => 'imdb_link', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');
                        $opis = array('name' => 'opis', 'id' => 'opis', 'class' => 'tb_forma_polje', 'form' => 'forma_unos');

                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'film', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><?php echo form_input($naziv); ?></td>
                        <td><?php echo form_input($slika); ?></td>
                        <td><?php echo form_input($godina_nastanka); ?></td>
                        <td><?php echo form_input($imdb_rejting); ?></td>
                        <td "><?php echo form_input($tor_link_720p); ?></td>
                        <td class="col-md-2"><?php echo form_input($tor_link_1080p); ?></td>
                        <td><?php echo form_input($imdb_link); ?></td>
                        <td><?php echo form_input($opis); ?></td>
                        <td><select name="glavni_zanr" id="glavni_zanr" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($zanr as $za) { ?>
                                    <option value="<?php echo $za->naziv_zanra ?>"><?php echo $za->naziv_zanra ?></option>
                                <?php } ?>
                            </select>
                        </td>


                        <td>
                            <button name="dodaj"  class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;

            case 'fil_glu':
                ?>
                <thead>
                    <tr>
                        <th>Film</th>
                        <th>Glumac</th>   
                        <th>vreme_unosa</th> 
                        <th>izmenio/uneo</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($film_glumac as $red) :

                        if (isset($id_film) && isset($id_glumac) && $id_film == $red->id_film && $id_glumac == $red->id_glumac):

                            $attributes = array('id' => 'forma_izmena');

                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'fil_glu', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><select name="id_film" id="id_film" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($film as $f) { ?>
                                            <option value="<?php echo $f->id ?>"><?php echo $f->naziv ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><select name="id_glumac" id="id_glumac" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($glumci as $g) { ?>
                                            <option value="<?php echo $g->id ?>"><?php echo $g->ime ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <?php if ($red->vreme == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme); ?></td>
                                <?php } ?>
                                <?php if ($red->uneo == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->uneo; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="sacuvaj_izmenu" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni1(<?php echo $red->id_film; ?>,<?php echo $red->id_glumac; ?>)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('fil_glu');" ><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv; ?></td>
                                <td><?php echo $red->ime; ?></td>

                                <?php if ($red->vreme == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme); ?></td>
                                <?php } ?>
                                <?php if ($red->uneo == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->uneo; ?></td>
                                <?php } ?>
                                <td> 
                                    <button id="izmeni" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu1('fil_glu',<?php echo $red->id_film; ?>,<?php echo $red->id_glumac; ?>);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="obrisi" name="obrisi" class="admin_dugme" onclick="obrisi_red1('fil_glu',<?php echo $red->id_film; ?>,<?php echo $red->id_glumac; ?>);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'fil_glu', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><select name="id_film" id="id_film" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($film as $f) { ?>
                                    <option value="<?php echo $f->id ?>"><?php echo $f->naziv ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><select name="id_glumac" id="id_glumac" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($glumci as $g) { ?>
                                    <option  value="<?php echo $g->id ?>"><?php echo $g->ime ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button name="dodaj" class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;
                
                case 'fil_zan':
                ?>
                <thead>
                    <tr>
                        <th>Film</th>
                        <th>Glumac</th>   
                        <th>vreme_unosa</th> 
                        <th>izmenio/uneo</th>
                        <th>izmeni</th>
                        <th>obrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                        foreach ($film_zanr as $red) :

                        if (isset($id_film) && isset($id_zanr) && $id_film == $red->id_film && $id_zanr == $red->id_zanr):

                            $attributes = array('id' => 'forma_izmena');
                            $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'fil_zan', 'form' => 'forma_izmena', 'type' => 'hidden');
                            echo form_open('', $attributes);
                            ?>
                            <tr>
                                <td><select name="id_film" id="id_film" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($film as $f) { ?>
                                            <option value="<?php echo $f->id ?>"><?php echo $f->naziv ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><select name="id_zanr" id="id_zanr" class="tb_forma_polje" form="forma_izmena">
                                        <?php foreach ($zanr as $z) { ?>
                                            <option value="<?php echo $z->id ?>"><?php echo $z->naziv_zanra ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <?php if ($red->vreme == NULL) { ?>
                                    <td> </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme); ?></td>
                                <?php } ?>
                                <?php if ($red->uneo == NULL) { ?>
                                    <td>   </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->uneo; ?></td>
                                <?php } ?>
                                <td>
                                    <button id="sacuvaj_izmenu" name="sacuvaj_izmenu" class="admin_dugme" onclick="izmeni2(<?php echo $red->id_film; ?>,<?php echo $red->id_zanr; ?>)" ><i class="fa fa-lg fa-floppy-o"></i>
                                    </button>
                                </td>
                                <td>
                                    <button id="<?php echo $red->id; ?>" name="odustani" class="admin_dugme" onclick="ispisi_tabelu('fil_zan');"><i class="fa fa-lg fa-times"></i>
                                    </button>
                                </td>
                                <?php echo form_input($tabela); ?>
                            </tr>
                            <?php
                            echo form_close();
                        else:
                            ?>
                            <tr>
                                <td><?php echo $red->naziv; ?></td>
                                <td><?php echo $red->naziv_zanra; ?></td>

                                <?php if ($red->vreme == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo date('d-m-Y h:i:s', $red->vreme); ?></td>
                                <?php } ?>
                                <?php if ($red->uneo == NULL) { ?>
                                    <td>  </td>
                                <?php } else {
                                    ?>
                                    <td><?php echo $red->uneo; ?></td>
                                <?php } ?>
                                <td> 
                                    <button id="izmeni" name="izmeni" class="admin_dugme" onclick="ispisi_tabelu2('fil_zan',<?php echo $red->id_film; ?>,<?php echo $red->id_zanr; ?>);" ><i class="fa fa-lg fa-pencil"></i>
                                    </button> 
                                </td>
                                <td>
                                    <button id="obrisi" name="obrisi" class="admin_dugme" onclick="obrisi_red2('fil_zan',<?php echo $red->id_film; ?>,<?php echo $red->id_zanr; ?>);" ><i class="fa fa-lg fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <tr>
                        <?php
                        $attributes = array('id' => 'forma_unos');
                        $tabela = array('name' => 'tabela', 'id' => 'tabela', 'value' => 'fil_zan', 'form' => 'forma_unos', 'type' => 'hidden');
                        echo form_open('', $attributes);
                        ?>
                    <tr>
                        <td><select name="id_film" id="id_film" class="tb_forma_polje" form="forma_unos">
                                <?php foreach ($film as $f) { ?>
                                    <option value="<?php echo $f->id ?>"><?php echo $f->naziv ?></option>
                                <?php } ?>
                            </select>
                        </td>
                                <td><select name="id_zanr" id="id_zanr" class="tb_forma_polje" form="forma_unos">
                                        <?php foreach ($zanr as $z) { ?>
                                            <option value="<?php echo $z->id ?>"><?php echo $z->naziv_zanra ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                        <td>
                            <button name="dodaj" class="admin_dugme" onclick="dodaj()"><i class="fa fa-lg fa-floppy-o"></i>
                            </button>
                        </td>
                        <?php echo form_input($tabela); ?>
                    </tr>
                    <?php
                    echo form_close();
                    ?>
                    </tr>
                </tbody>
                <?php
                break;
        }
    endif;
    ?>		
</table>


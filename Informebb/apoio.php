<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="254" border="0" cellpadding="1" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
          <tr>
            <td height="22"" colspan="2" align="left" valign="bottom" class="tiutlo_not" id=" height="20><img src="imagens/titulos/noticias.jpg" width="118" height="20" /></td>
          </tr>
          <tr>
            <td height="66" colspan="2" align="left" valign="top"><?php do { ?>
                    <table width="100%" border="0" cellpadding="2">
                      <tr>
                        <td height="71" align="left" valign="top"><table width="99%" height="50" border="0" align="left" cellpadding="2" cellspacing="0" class="borda_pontilhada_noticias">
                            <tr>
                              <td width="24%" rowspan="2" align="left" valign="top"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{noticias.imagem}", 80, 60, false); ?>" width="80" height="60" hspace="5" border="0" align="center" class="borda_foto_noticia" /></a></td>
                              <td width="76%" height="19" align="left" valign="top"><span class="tiutlo_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="tiutlo_not"><?php echo $row_noticias['coluna']; ?></a></span></td>
                            </tr>
                            <tr>
                              <td height="30" align="left" valign="top" class="fonte_not"><a href="exibir_noticia.php?id=<?php echo $row_noticias['id']; ?>" class="fonte_not"><?php echo substr($row_noticias['titulo'] ,0,40)."..."; ?></a></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
              <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?></td>
          </tr>
          <tr>
            <td height="16" colspan="2" align="right" valign="top" bgcolor="#3399FE"><a href="arquivo.php"><img src="imagens/titulos/mais_not.jpg" width="94" height="16" border="0" /></a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td><img src="imagens/ondas.jpg" alt="ondas" width="249" height="70" border="0" usemap="#MapMap" class="borda_tabela" />
              <map name="MapMap" id="MapMap2">
                <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                <area shape="rect" coords="174,53,235,63" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_niteroi_itam" />
            </map></td>
      </tr>
    </table>
        <table width="100" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td><map name="MapMap" id="MapMap">
                <area shape="rect" coords="174,11,246,26" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_praiav" />
                <area shape="rect" coords="174,32,212,44" href="http://waves.terra.com.br/wavescheck.asp?pico=rj_saqua_itauna" />
                <area shape="rect" coords="174,53,235,63" href="#" />
              </map>
              <a href="http://www.orkut.com/Community.aspx?cmm=184137" target="_blank"><img src="imagens/orkut.jpg" alt="orkut" width="251" height="50" border="0" class="borda_tabela" /></a></td>
          </tr>
        </table>
      <table width="253" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td><table width="253" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_gatinhas">
                <tr>
                  <td width="240" height="23" align="left" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td height="64" align="center" valign="middle"><table border="0">
                      <tr>
                        <?php
  do { // horizontal looper version 3
?>
                        <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                            <tr>
                              <td width="36"><a href="javascript:abrir_janela('gatinhas/index.php?galeria=gatas','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{galeria_gatinhas.arquivo}", 100, 75, false); ?>" border="0" /></a></td>
                            </tr>
                        </table></td>
                        <?php
    $row_galeria_gatinhas = mysql_fetch_assoc($galeria_gatinhas);
    if (!isset($nested_galeria_gatinhas)) {
      $nested_galeria_gatinhas= 1;
    }
    if (isset($row_galeria_gatinhas) && is_array($row_galeria_gatinhas) && $nested_galeria_gatinhas++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_galeria_gatinhas); //end horizontal looper version 3
?>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
      <table width="253" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td><table width="253" border="0" cellpadding="0" cellspacing="0" class="borda_fundo_noticas">
                <tr>
                  <td height="20" align="left" valign="middle" bgcolor="#009966"><img src="imagens/titulos/festa.jpg" width="118" height="20" /></td>
                </tr>
                <tr>
                  <td height="60"><table width="100%" height="141" border="0" cellpadding="0" cellspacing="0" bgcolor="#D8F5CD">
                      <tr>
                        <td height="119" align="center" valign="middle"><table width="236" border="1" cellpadding="0" cellspacing="2" bordercolor="#666666" bgcolor="#FFFFFF">
                            <tr>
                              <td><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><img src="<?php echo tNG_showDynamicImage("", "uploads/fotos/", "{festa.imagem}");?>" border="0" /></a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="18" align="center" valign="top"><a href="javascript:AbrirGaleria('<?php echo $row_festa['pasta']; ?>');"><?php echo $row_festa['nome']; ?></a></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="14" align="left" valign="middle" bgcolor="#009966"><span class="tiutlo_not"><img src="imagens/titulos/vemai.jpg" width="118" height="20" /></span></td>
                </tr>
                <tr>
                  <td width="48%" height="60" align="center" valign="top" bgcolor="#D8F5CD"><table border="0">
                      <tr>
                        <?php
  do { // horizontal looper version 3
?>
                        <td width="108"><table width="22%" height="97" border="0" cellpadding="2" cellspacing="0">
                            <tr>
                              <td height="60" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="vem.php?id=<?php echo $row_vem_ai['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{vem_ai.flyer}", 100, 75, false); ?>" border="0" class="borda_tabela" /></a></td>
                            </tr>
                            <tr>
                              <td height="37" colspan="2" align="center" valign="middle" bgcolor="#D8F5CD"><a href="javascript:abrir_janela('album/index.php?id=<?php echo $row_galeria['id']; ?>','Saquabb','','700','500','true')" class="tiutlo_not"><?php echo $row_vem_ai['nome']; ?></a></td>
                            </tr>
                        </table></td>
                        <?php
    $row_vem_ai = mysql_fetch_assoc($vem_ai);
    if (!isset($nested_vem_ai)) {
      $nested_vem_ai= 1;
    }
    if (isset($row_vem_ai) && is_array($row_vem_ai) && $nested_vem_ai++ % 2==0) {
      echo "</tr><tr>";
    }
  } while ($row_vem_ai); //end horizontal looper version 3
?>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="82%" align="center" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" class="borda_tabela">
          <tr>
            <td width="308" height="20" align="left" valign="middle" class="tiutlo_not"><img src="imagens/titulos/destaque.jpg" width="118" height="20" /></td>
          </tr>
          <tr>
            <td height="87" align="center" valign="top" id="espaco_celulas"><script type="text/javascript">objeto('capa_grande','400','240')</script></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="266" align="center" valign="top"><table width="314" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="borda_tabela">
          <tr>
            <td height="17" colspan="2" align="center" valign="middle"><div align="left"><span class="tiutlo_not"><img src="imagens/titulos/atl.jpg" width="118" height="20" /></span></div></td>
          </tr>
          <tr>
            <td width="131" height="77" align="center" valign="top"><table width="144" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                  <tr>
                    <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="perfil_borda_foto" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><span class="tiutlo_not"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></span></td>
              </tr>
            </table>
                    <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
            <td width="153" align="center" valign="top" class="tiutlo_not"><table width="125" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="125" align="center" valign="middle"><table width="42" border="0" cellpadding="0" cellspacing="0" class="borda_tabela">
                  <tr>
                    <td width="40"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}", 90, 120, false); ?>" width="90" height="120" border="0" class="perfil_borda_foto" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>" class="tiutlo_not"><?php echo $row_atletas['nome']; ?></a></td>
              </tr>
            </table>
                    <br />
                    <?php $row_atletas = mysql_fetch_assoc($atletas); ?></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="borda_pontilhada_noticias">
              <tr>
                <th scope="col"><table border="0">
                  <tr>
                    <?php
  do { // horizontal looper version 3
?>
                    <td><table width="46%" border="0" cellpadding="2" cellspacing="0">
                      <tr>
                        <td width="7%" height="17" align="center" valign="middle"><a href="exibir_perfil.php?id=<?php echo $row_atletas['id']; ?>"><img src="<?php echo tNG_showDynamicThumbnail("", "perfil/fotos/", "{atletas.foto}",40,40, false); ?>" alt="<?php echo $row_atletas['nome']; ?>" width="40" height="40" border="0" class="borda_tabela" /></a></td>
                      </tr>
                    </table></td>
                    <?php
    $row_atletas = mysql_fetch_assoc($atletas);
    if (!isset($nested_atletas)) {
      $nested_atletas= 1;
    }
    if (isset($row_atletas) && is_array($row_atletas) && $nested_atletas++ % 6==0) {
      echo "</tr><tr>";
    }
  } while ($row_atletas); //end horizontal looper version 3
?>
                  </tr>
                </table></th>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="right" valign="middle" bgcolor="#FF6666" class="tiutlo_not"><a href="perfil.php"><img src="imagens/titulos/mais_atletas.jpg" width="94" height="16" border="0" /></a></td>
          </tr>
        </table></td>
      </tr>
    </table>
        <table width="314" border="0" cellpadding="0" cellspacing="2" class="tabela_galeria_fotos">
          <tr>
            <td height="23" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="68" align="center" valign="middle"><table border="0">
                <tr>
                  <?php
  do { // horizontal looper version 3
?>
                  <td><table width="44" height="42" border="1" cellpadding="0" cellspacing="2" bordercolor="#000000" bgcolor="#FFFFFF">
                      <tr>
                        <td width="36"><a href="javascript:abrir_janela('album/index.php?galeria=saquabb','Saquabb','','700','500','true')"><img src="<?php echo tNG_showDynamicThumbnail("", "uploads/fotos/", "{recodset_foto.arquivo}", 63, 48, false); ?>" width="63" height="48" border="0" /></a></td>
                      </tr>
                  </table></td>
                  <?php
    $row_recodset_foto = mysql_fetch_assoc($recodset_foto);
    if (!isset($nested_recodset_foto)) {
      $nested_recodset_foto= 1;
    }
    if (isset($row_recodset_foto) && is_array($row_recodset_foto) && $nested_recodset_foto++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_recodset_foto); //end horizontal looper version 3
?>
                </tr>
            </table></td>
          </tr>
      </table></td>
    <td width="18%" align="center" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>

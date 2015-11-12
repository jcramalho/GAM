<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xs="http://www.w3.org/2001/XMLSchema"
  version="1.0">

  <xsl:template match="obra">
      <html>
        <body>
            <xsl:call-template name="show-meta"/>
            <xsl:apply-templates select="instrumentos"/>
          <address>[<a href="index.html">Voltar ao menu principal</a>]</address>
        </body>
      </html>
    

  </xsl:template>
  
  <!-- Instrumentos: ................................................... -->
  
  <xsl:template match="instrumentos">
    <h3>Partituras disponíveis:</h3>
    <ul>
      <xsl:for-each select="instrumento">
        <li>
          <xsl:value-of select="designacao"/>
          <xsl:if test="partitura/@voz">
            , <xsl:value-of select="partitura/@voz"/>
          </xsl:if>
          <xsl:if test="partitura/@clave">
            , Clave: <xsl:value-of select="partitura/@clave"/> 
          </xsl:if>
          <xsl:if test="partitura/@afinacao">
            , Afinação: <xsl:value-of select="partitura/@afinacao"/> 
          </xsl:if>
        </li>
      </xsl:for-each>
    </ul>
  </xsl:template>

  <!-- ...................Mostra a metainformação da obra............... -->

  <xsl:template name="show-meta">
    <h1>
      <xsl:value-of select="titulo"/>
    </h1>
    <table border="1">
      <tr>
        <td>Código: </td>
        <td><xsl:value-of select="@id"/></td>
      </tr>
      <tr>
        <td>Título: </td>
        <td><xsl:value-of select="titulo"/></td>
      </tr>
      <xsl:if test="subtitulo">
        <tr>
          <td>Subtítulo: </td>
          <td><xsl:value-of select="subtitulo"/></td>
        </tr>
      </xsl:if>
      <xsl:if test="tipo">
        <tr>
          <td>Tipo/Classe: </td>
          <td><xsl:value-of select="tipo"/></td>
        </tr>
      </xsl:if>
      <xsl:if test="desc">
        <tr>
          <td>Descrição: </td>
          <td><xsl:apply-templates select="desc/*"/></td>
        </tr>
      </xsl:if>
      <xsl:if test="compositor">
        <tr>
          <td>Compositor: </td>
          <td><xsl:value-of select="compositor"/></td>
        </tr>
      </xsl:if>
      <xsl:if test="arranjo">
        <tr>
          <td>Arranjo: </td>
          <td><xsl:value-of select="arranjo"/></td>
        </tr>
      </xsl:if>
      <xsl:if test="inf-relacionada">
        <tr>
          <td>Media: </td>
          <td><xsl:apply-templates select="inf-relacionada"/></td>
        </tr>
      </xsl:if>
    </table>
  </xsl:template>
  
  <xsl:template match="para">
    <p>
      <xsl:value-of select="."/>
    </p>
  </xsl:template>

  <!-- ...................Trata os videos................................ -->

  <xsl:template match="video">
        <iframe width="200" height="150" src="https://www.youtube.com/embed/{substring-after(@href,'v=')}" frameborder="0"
          allowfullscreen="1">.</iframe>  
  </xsl:template>

</xsl:stylesheet>

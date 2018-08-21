<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format">
<xsl:output method="html" indent="no"/>
<xsl:strip-space elements="*"/>
	<!--MENU-->
	<xsl:template match="MENU" mode="top">
		<xsl:apply-templates select="MENU-ITEM"  mode="top"/>
	</xsl:template>
 
	<!--MENU-ITEM-->
	<xsl:template match="MENU-ITEM"  mode="top">
			<xsl:choose>
            <!-- when vizited inside-->
            	<xsl:when test="MENU-ITEM[@ID=/LAYOUT/@ID]" >
					<td><a href="{@HREF}"><img src="images/abullet.gif" border="0"/></a></td>
    				<td width="4"><div style="width:4px; height:1px;"><spacer type="block" width="4" height="1"/></div></td>
    				<td><a href="{@HREF}" class="menu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
    				<td width="20"><div style="width:20px; height:1px;"><spacer type="block" width="20" height="1"/></div></td>
                </xsl:when>
                <!-- when active-->
                <xsl:when test="MENU-ITEM[@ID=/LAYOUT/@ID] or @ID=/LAYOUT/@ID" >
					<td><img src="images/abullet.gif" border="0"/></td>
    				<td width="4"><div style="width:4px; height:1px;"><spacer type="block" width="4" height="1"/></div></td>
    				<td><span class="menu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></span></td>
    				<td width="20"><div style="width:20px; height:1px;"><spacer type="block" width="20" height="1"/></div></td>
                </xsl:when>
                <xsl:otherwise>
					<td><a href="{@HREF}"><img src="images/bullet.gif" border="0"/></a></td>
    				<td width="4"><div style="width:4px; height:1px;"><spacer type="block" width="4" height="1"/></div></td>
    				<td><a href="{@HREF}" class="menu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>
    				<td width="20"><div style="width:20px; height:1px;"><spacer type="block" width="20" height="1"/></div></td>
                </xsl:otherwise>
            </xsl:choose>
	</xsl:template>


	
	<xsl:template match="MENU-ITEM" mode="sub">
        <xsl:choose>
            <xsl:when test="@ID=/LAYOUT/@ID" >
   				<tr>	
   					<td style="padding: 0px 5px 0px 32px"><span><img src="images/submenu_bullet.gif" border="0"/></span></td>
   					<td height="32" width="172"><span class="asubmenu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></span></td>					
   				</tr>				
   				<xsl:if test="position()!=last()">
	   				<tr><td height="2" colspan="2" style="background-image: url('images/submenu_hr.gif'); background-repeat: repeat-x;"><div style="width:180px; height:0px;"><spacer type="block" width="180" height="0" /></div></td></tr>
	   			</xsl:if>
            </xsl:when>
            <xsl:otherwise>
				<xsl:if test="../MENU-ITEM[@ID=/LAYOUT/@ID] or ../../MENU-ITEM[@ID=/LAYOUT/@ID]">
    				<tr>	
    					<td style="padding: 0px 5px 0px 32px"><a href="{@HREF}"><img src="images/submenu_bullet.gif" border="0"/></a></td>
    					<td height="32" width="172"><a href="{@HREF}" class="submenu"><xsl:value-of select="@TITLE" disable-output-escaping="yes"/></a></td>					
    				</tr>
    				<xsl:if test="position()!=last()">
		   				<tr><td height="2" colspan="2" style="background-image: url('images/submenu_hr.gif'); background-repeat: repeat-x;"><div style="width:180px; height:0px;"><spacer type="block" width="180" height="0" /></div></td></tr>					
	 	   			</xsl:if>
				</xsl:if>
            </xsl:otherwise>
		</xsl:choose>
	</xsl:template>

</xsl:stylesheet>

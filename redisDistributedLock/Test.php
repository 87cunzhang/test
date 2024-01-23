<itemSchema>
    <field id="wirelessDesc" name="旺铺无线详情描述" type="complex">
        <rules>
            <rule name="devTipRule" value="5.模块"/>
            <rule name="devTipRule" value="6.更多说"/>
        </rules>
        <complex-value>
            <field id="text_1" type="complex">
                <complex-value>
                    <field id="images" type="multiComplex">
                        <complex-values>
                            <field id="width" type="input">
                                <value>620</value>
                            </field>
                            <field id="url" type="input">
                                <value>//img.alicdn.com/imgextra/i3/13927280/O1CN01vji9MC23eIBbwmEM1_!!13927280.jpg</value>
                            </field>
                            <field id="height" type="input">
                                <value>41</value>
                            </field>
                        </complex-values>
                    </field>
                    <field id="enable" type="singleCheck">
                        <value>true</value>
                    </field>
                    <field id="countHeight" type="singleCheck">
                        <value>false</value>
                    </field>
                    <field id="id" type="input">
                        <value>group1680162632203</value>
                    </field>
                    <field id="textStyle" type="complex">
                        <complex-value>
                            <field id="fontFamily" type="singleCheck">
                                <value>SimHei</value>
                            </field>
                            <field id="color" type="input">
                                <value>#333333</value>
                            </field>
                            <field id="top" type="input">
                                <value>10</value>
                            </field>
                            <field id="textAlign" type="singleCheck">
                                <value>left</value>
                            </field>
                            <field id="left" type="input">
                                <value>0</value>
                            </field>
                            <field id="bottom" type="input">
                                <value>10</value>
                            </field>
                            <field id="width" type="input">
                                <value>620</value>
                            </field>
                            <field id="fontSize" type="singleCheck">
                                <value>14</value>
                            </field>
                            <field id="right" type="input">
                                <value>0</value>
                            </field>
                            <field id="value" type="input">
                                <value>水壶水壶</value>
                            </field>
                            <field id="height" type="input">
                                <value>41</value>
                            </field>
                        </complex-value>
                    </field>
                    <field id="sample" type="multiComplex">
                        <complex-values>
                            <field id="width" type="input"/>
                            <field id="url" type="input">
                                <value>//img.alicdn.com/imgextra/i1/O1CN01QT2cUA1uaKAGxMRJS_!!6000000006053-2-tps-620-316.png</value>
                            </field>
                            <field id="height" type="input"/>
                        </complex-values>
                    </field>
                </complex-value>
            </field>
            <field id="image_hot_area_0" type="complex">
                <complex-value>
                    <field id="image" type="complex">
                        <complex-value>
                            <field id="width" type="input">
                                <value>620</value>
                            </field>
                            <field id="url" type="input">
                                <value>https://img.alicdn.com/imgextra/i1/13927280/TB22FZGf9YH8KJjSspdXXcRgVXa_!!13927280.jpg</value>
                            </field>
                            <field id="height" type="input">
                                <value>310</value>
                            </field>
                        </complex-value>
                    </field>
                    <field id="enable" type="singleCheck">
                        <value>true</value>
                    </field>
                    <field id="countHeight" type="singleCheck">
                        <value>true</value>
                    </field>
                    <field id="hot_area" type="multiComplex"/>
                    <field id="id" type="input">
                        <value>group16825050050651</value>
                    </field>
                    <field id="sample" type="multiComplex">
                        <complex-values>
                            <field id="width" type="input">
                                <value>620</value>
                            </field>
                            <field id="url" type="input">
                                <value>https://img.alicdn.com/imgextra/i1/13927280/TB22FZGf9YH8KJjSspdXXcRgVXa_!!13927280.jpg</value>
                            </field>
                            <field id="height" type="input">
                                <value>310</value>
                            </field>
                        </complex-values>
                    </field>
                </complex-value>
            </field>
            <field id="config" type="complex">
                <complex-value>
                    <field id="maxHeight" type="input">
                        <value>35000</value>
                    </field>
                    <field id="width" type="input">
                        <value>620</value>
                    </field>
                    <field id="splitHeight" type="input">
                        <value>960</value>
                    </field>
                </complex-value>
            </field>
        </complex-value>
        <fields>
            <field id="version" name="编辑器版本号" type="input">
                <rules>
                    <rule name="devTipRule" value="效。"/>
                    <rule name="requiredRule" value="true"/>
                    <rule name="readOnlyRule" value="true"/>
                </rules>
            </field>
            <field id="hbaggabehfai" name="未来新增模块" type="complex">
                <rules>
                    <rule name="devTipRule" value="该，无实际业务含义"/>
                </rules>
                <fields>
                    <field id="id" name="模块id" type="input">
                        <rules>
                            <rule name="readOnlyRule" value="true"/>
                        </rules>
                    </field>
                    <field id="countHeight" name="是否计算在总高度内" type="singleCheck">
                        <rules>
                            <rule name="devTipRule" value="在内"/>
                            <rule name="readOnlyRule" value="true"/>
                        </rules>
                        <options>
                            <option displayName="是" value="true"/>
                            <option displayName="否" value="false"/>
                        </options>
                    </field>
                    <field id="enable" name="是否启用" type="singleCheck">
                        <options>
                            <option displayName="启用" value="true"/>
                            <option displayName="不启用" value="false"/>
                        </options>
                    </field>
                    <field id="sample" name="示意图" type="multiComplex">
                        <rules>
                            <rule name="devTipRule" value="信息"/>
                        </rules>
                        <fields>
                            <field id="image_0" name="图片信息" type="complex">
                                <fields>
                                    <field id="url" name="示意图链接" type="input">
                                        <rules>
                                            <rule name="devTipRule" value="示意图链接，多个以逗号分隔"/>
                                            <rule name="readOnlyRule" value="true"/>
                                            <rule name="valueTypeRule" value="url"/>
                                        </rules>
                                    </field>
                                    <field id="width" name="示意图宽度" type="input">
                                        <rules>
                                            <rule name="devTipRule" value="示意图宽度"/>
                                            <rule name="readOnlyRule" value="true"/>
                                            <rule name="valueTypeRule" value="integer"/>
                                        </rules>
                                    </field>
                                    <field id="height" name="示意图高度" type="input">
                                        <rules>
                                            <rule name="devTipRule" value="示意图高度"/>
                                            <rule name="readOnlyRule" value="true"/>
                                            <rule name="valueTypeRule" value="integer"/>
                                        </rules>
                                    </field>
                                </fields>
                            </field>
                        </fields>
                    </field>
                </fields>
            </field>
        </fields>
    </field>
</itemSchema>

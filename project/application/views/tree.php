<!DOCTYPE HTML>
<html>
    <head>
      <title>LeAPPsa</title>
      <meta name="description" content="website description" />
      <meta name="keywords" content="website keywords, website keywords" />
      <meta http-eAuiv="content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="/public/style/tree.css" title="style" />
    </head>
<body style="zoom:50%; -moz-transform: scale(0.5);">
    <div style="height: 100%; width: 10000px; overflow: hidden;">
    <div class="tree">
	<ul>
<!--        --><?php
                $depthVal = current($this->treeData)['depth'];
                foreach ($this->treeData as $aNode) {
//                    $aDepthVal =
                    echo '<pre>' . var_export($aNode, true) . '</pre>';
                }
//        ?>
		<li>
			<a href="#">Parent</a>
			<ul>
				<li>
					<a href="#">A</a>
					<ul>
						<li>
							<a href="#">A</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">A</a>
					<ul>
						<li><a href="#">A</a></li>
						<li>
							<a href="#" onclick="alert('TESTT!'); return false;">AA
							</a>
                        </li>
                    </ul>
				</li>
			</ul>
		</li>
	</ul>
</div>
    </div>
</body>
</html>
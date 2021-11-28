<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script>

        const takeOrders = async () => {//:3000
            const req = await fetch('http://localhost/akari/api/teste.php/', {
                method: 'POST',
                body: JSON.stringify({
                    cliente: 'AÇÃO',
                    produto: JSON.stringify(['ASSA-ZUKE', 'KIMPIRA', 'TYOSEN', 'ASSA-ZUKE', 'KIMPIRA', 'TYOSEN'])
                }),
                headers:{
                    'Content-Type': 'application/json',
                }
            })
            const res = await req.json()
            console.log(res)
        }        

        takeOrders()
        
    </script>
</body>
</html>


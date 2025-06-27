<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Consulta RUC - Documentación</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px; background: #f8f9fa; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .endpoint { background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 8px; border-left: 4px solid #007bff; }
        .method { background: #007bff; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .method.post { background: #28a745; }
        .url { font-family: monospace; background: #e9ecef; padding: 8px; border-radius: 4px; margin: 10px 0; font-weight: bold; }
        .example { background: #f8f9fa; padding: 15px; border-radius: 4px; margin: 10px 0; }
        pre { background: #343a40; color: #fff; padding: 15px; border-radius: 4px; overflow-x: auto; font-size: 14px; }
        .test-form { background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0; }
        button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #0056b3; }
        input[type="text"] { padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 200px; font-size: 16px; }
        #result { margin-top: 20px; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; border: 1px solid #f5c6cb; }
        h1 { color: #333; text-align: center; }
        h2 { color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        h3 { color: #495057; }
        .back-btn { background: #6c757d; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 20px; }
        .back-btn:hover { background: #545b62; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">← Volver al formulario</a>
        
        <h1>🚀 API Consulta RUC - Documentación</h1>
        
        <h2>📋 Información General</h2>
        <p>Esta API permite consultar información de empresas mediante su RUC en el registro de SUNAT de Perú.</p>
        <ul>
            <li><strong>Formato de respuesta:</strong> JSON</li>
            <li><strong>Encoding:</strong> UTF-8</li>
            <li><strong>CORS:</strong> Habilitado</li>
            <li><strong>Métodos soportados:</strong> GET, POST</li>
        </ul>
        
        <div class="endpoint">
            <h3>🔗 Endpoint Base</h3>
            <div class="url">http://localhost/consulta-ruc/api.php</div>
        </div>
        
        <h2>📖 Métodos Disponibles</h2>
        
        <div class="endpoint">
            <h3><span class="method">GET</span> Consultar RUC por parámetro</h3>
            <div class="url">GET /api.php?ruc={ruc}</div>
            
            <h4>Parámetros:</h4>
            <ul>
                <li><strong>ruc</strong> (string, requerido): RUC de 11 dígitos numéricos</li>
            </ul>
            
            <h4>Ejemplos de uso:</h4>
            <div class="example">
                <strong>cURL:</strong>
                <pre>curl "http://localhost/consulta-ruc/api.php?ruc=20100070970"</pre>
            </div>
            
            <div class="example">
                <strong>JavaScript (Fetch):</strong>
                <pre>fetch('http://localhost/consulta-ruc/api.php?ruc=20100070970')
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log('Empresa:', data.data.razonSocial);
    } else {
      console.error('Error:', data.message);
    }
  });</pre>
            </div>
            
            <div class="example">
                <strong>Python (requests):</strong>
                <pre>import requests

response = requests.get('http://localhost/consulta-ruc/api.php?ruc=20100070970')
data = response.json()

if data['success']:
    print(f"Empresa: {data['data']['razonSocial']}")
else:
    print(f"Error: {data['message']}")</pre>
            </div>
        </div>
        
        <div class="endpoint">
            <h3><span class="method post">POST</span> Consultar RUC por JSON</h3>
            <div class="url">POST /api.php</div>
            
            <h4>Headers requeridos:</h4>
            <ul>
                <li><strong>Content-Type:</strong> application/json</li>
            </ul>
            
            <h4>Body (JSON):</h4>
            <pre>{"ruc": "20100070970"}</pre>
            
            <h4>Ejemplos de uso:</h4>
            <div class="example">
                <strong>cURL:</strong>
                <pre>curl -X POST \
  -H "Content-Type: application/json" \
  -d '{"ruc":"20100070970"}' \
  http://localhost/consulta-ruc/api.php</pre>
            </div>
            
            <div class="example">
                <strong>JavaScript (Fetch):</strong>
                <pre>fetch('http://localhost/consulta-ruc/api.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({ruc: '20100070970'})
})
.then(response => response.json())
.then(data => console.log(data));</pre>
            </div>
        </div>
        
        <h2>📝 Formato de Respuestas</h2>
        
        <h3>✅ Respuesta Exitosa (HTTP 200)</h3>
        <pre>{
  "success": true,
  "message": "Consulta exitosa",
  "timestamp": "2025-06-27 10:30:00",
  "ruc": "20100070970",
  "data": {
    "ruc": "20100070970",
    "razonSocial": "SUPERMERCADOS PERUANOS SOCIEDAD ANONIMA",
    "nombreComercial": "SUPERMERCADOS PERUANOS S.A.",
    "tipo": "SOCIEDAD ANONIMA",
    "estado": "ACTIVO",
    "condicion": "HABIDO",
    "direccion": "AV. PRIMAVERA NRO. 2390",
    "departamento": "LIMA",
    "provincia": "LIMA",
    "distrito": "SANTIAGO DE SURCO",
    "fechaInscripcion": "1998-05-25",
    "actEconomicas": [
      "VENTA AL POR MENOR EN ALMACENES NO ESPECIALIZADOS CON PREDOMINIO DE LA VENTA DE ALIMENTOS, BEBIDAS Y TABACO.",
      "OTRAS ACTIVIDADES DE SERVICIOS DE COMIDAS."
    ]
  }
}</pre>
        
        <h3>❌ Respuesta de Error</h3>
        
        <h4>RUC no encontrado (HTTP 404):</h4>
        <pre>{
  "success": false,
  "error": "NOT_FOUND",
  "message": "No se encontraron datos para el RUC proporcionado",
  "ruc": "12345678901"
}</pre>
        
        <h4>Parámetros inválidos (HTTP 400):</h4>
        <pre>{
  "success": false,
  "error": "INVALID_LENGTH",
  "message": "RUC debe tener exactamente 11 dígitos",
  "received": "123456789"
}</pre>
        
        <h4>Error del servidor (HTTP 500):</h4>
        <pre>{
  "success": false,
  "error": "SERVER_ERROR",
  "message": "Error interno del servidor",
  "details": "Connection timeout"
}</pre>
        
        <h2>📊 Códigos de Estado HTTP</h2>
        <ul>
            <li><strong>200 OK:</strong> Consulta exitosa</li>
            <li><strong>400 Bad Request:</strong> Parámetros inválidos o faltantes</li>
            <li><strong>404 Not Found:</strong> RUC no encontrado</li>
            <li><strong>500 Internal Server Error:</strong> Error interno del servidor</li>
        </ul>
        
        <h2>🧪 Probador de API</h2>
        <div class="test-form">
            <h3>Probar API en vivo</h3>
            <input type="text" id="rucInput" placeholder="Ingrese RUC (11 dígitos)" maxlength="11" pattern="[0-9]{11}">
            <button onclick="testAPI()">🔍 Consultar RUC</button>
            
            <div id="result"></div>
        </div>
        
        <h2>💡 Ejemplos de RUC válidos para pruebas</h2>
        <ul>
            <li><strong>20100070970</strong> - Supermercados Peruanos</li>
            <li><strong>20100017491</strong> - Telefónica del Perú</li>
            <li><strong>20131312955</strong> - Compañía Minera Antamina</li>
            <li><strong>20100128218</strong> - Banco de Crédito del Perú</li>
        </ul>
        
        <h2>⚠️ Limitaciones</h2>
        <ul>
            <li>Solo consulta RUC de empresas peruanas</li>
            <li>Depende de la disponibilidad del servicio de SUNAT</li>
            <li>No incluye consulta de DNI (servicio no disponible)</li>
            <li>Puede tener demora en respuesta durante alta demanda</li>
        </ul>
    </div>
    
    <script>
        function testAPI() {
            const ruc = document.getElementById('rucInput').value;
            const resultDiv = document.getElementById('result');
            
            if (!ruc) {
                resultDiv.innerHTML = '<div class="error">❌ Por favor ingrese un RUC</div>';
                return;
            }
            
            if (ruc.length !== 11) {
                resultDiv.innerHTML = '<div class="error">❌ El RUC debe tener exactamente 11 dígitos</div>';
                return;
            }
            
            resultDiv.innerHTML = '<div style="text-align: center; padding: 20px;">🔄 Consultando RUC...</div>';
            
            fetch(`api.php?ruc=${ruc}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        resultDiv.innerHTML = `
                            <div class="success">
                                <h4>✅ Consulta exitosa</h4>
                                <p><strong>Empresa:</strong> ${data.data.razonSocial || 'N/A'}</p>
                                <p><strong>Estado:</strong> ${data.data.estado || 'N/A'}</p>
                                <p><strong>Dirección:</strong> ${data.data.direccion || 'N/A'}</p>
                            </div>
                            <h4>📋 Respuesta completa:</h4>
                            <pre style="max-height: 300px; overflow-y: auto;">${JSON.stringify(data, null, 2)}</pre>
                        `;
                    } else {
                        resultDiv.innerHTML = `
                            <div class="error">
                                <h4>❌ Error en la consulta</h4>
                                <p><strong>Código:</strong> ${data.error || 'UNKNOWN'}</p>
                                <p><strong>Mensaje:</strong> ${data.message || 'Error desconocido'}</p>
                            </div>
                            <h4>📋 Respuesta completa:</h4>
                            <pre>${JSON.stringify(data, null, 2)}</pre>
                        `;
                    }
                })
                .catch(error => {
                    resultDiv.innerHTML = `
                        <div class="error">
                            <h4>❌ Error de conexión</h4>
                            <p>No se pudo conectar con la API: ${error.message}</p>
                        </div>
                    `;
                });
        }
        
        // Solo permitir números en el input
        document.getElementById('rucInput').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });
        
        // Permitir consulta con Enter
        document.getElementById('rucInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                testAPI();
            }
        });
    </script>
</body>
</html>

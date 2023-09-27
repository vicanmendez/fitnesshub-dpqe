<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        echo "Seeding provinces...";
        DB::table('provinces')->insert([
            // Argentina
            ['name' => 'Buenos Aires', 'country_id' => 1],
            ['name' => 'Córdoba', 'country_id' => 1],
            ['name' => 'Santa Fe', 'country_id' => 1],
            ['name' => 'Mendoza', 'country_id' => 1],
            ['name' => 'Tucumán', 'country_id' => 1],
            ['name' => 'Entre Ríos', 'country_id' => 1],
            ['name' => 'Salta', 'country_id' => 1],
            ['name' => 'Misiones', 'country_id' => 1],
            ['name' => 'Chaco', 'country_id' => 1],
            ['name' => 'Corrientes', 'country_id' => 1],
            ['name' => 'Santiago del Estero', 'country_id' => 1],
            ['name' => 'San Juan', 'country_id' => 1],
            ['name' => 'Jujuy', 'country_id' => 1],
            ['name' => 'Río Negro', 'country_id' => 1],
            ['name' => 'Formosa', 'country_id' => 1],
            ['name' => 'Neuquén', 'country_id' => 1],
            ['name' => 'Chubut', 'country_id' => 1],
            ['name' => 'San Luis', 'country_id' => 1],
            ['name' => 'Catamarca', 'country_id' => 1],
            ['name' => 'La Rioja', 'country_id' => 1],
            ['name' => 'La Pampa', 'country_id' => 1],
            ['name' => 'Santa Cruz', 'country_id' => 1],
            ['name' => 'Tierra del Fuego', 'country_id' => 1],
            
           

            // Brazil
            ['name' => 'Acre', 'country_id' => 2],
            ['name' => 'Alagoas', 'country_id' => 2],
            ['name' => 'Amapá', 'country_id' => 2],
            ['name' => 'Amazonas', 'country_id' => 2],
            ['name' => 'Bahia', 'country_id' => 2],
            ['name' => 'Ceará', 'country_id' => 2],
            ['name' => 'Distrito Federal', 'country_id' => 2],
            ['name' => 'Espírito Santo', 'country_id' => 2],
            ['name' => 'Goias', 'country_id' => 2],
            ['name' => 'Maranhão', 'country_id' => 2],
            ['name' => 'Minas Gerais', 'country_id' => 2],
            ['name' => 'Pará', 'country_id' => 2],
            ['name' => 'Paraíba', 'country_id' => 2],
            ['name' => 'Paraná', 'country_id' => 2],
            ['name' => 'Pernambuco', 'country_id' => 2],
            ['name' => 'Piauí', 'country_id' => 2],
            ['name' => 'Rio de Janeiro', 'country_id' => 2],
            ['name' => 'Rio Grande do Norte', 'country_id' => 2],
            ['name' => 'Rio Grande do Sul', 'country_id' => 2],
            ['name' => 'Rondônia', 'country_id' => 2],
            ['name' => 'Roraima', 'country_id' => 2],
            ['name' => 'Santa Catarina', 'country_id' => 2],
            ['name' => 'São Paulo', 'country_id' => 2],
            ['name' => 'Sergipe', 'country_id' => 2],
            ['name' => 'Tocantins', 'country_id' => 2],
            

            // Chile
            ['name' => 'Aisén del General Carlos Ibáñez del Campo', 'country_id' => 3],
            ['name' => 'Antofagasta', 'country_id' => 3],
            ['name' => 'Araucanía', 'country_id' => 3],
            ['name' => 'Arica y Parinacota', 'country_id' => 3],
            ['name' => 'Atacama', 'country_id' => 3],
            ['name' => 'Biobío', 'country_id' => 3],
            ['name' => 'Coquimbo', 'country_id' => 3],
            ['name' => 'Libertador General Bernardo O\'Higgins', 'country_id' => 3],
            ['name' => 'Los Lagos', 'country_id' => 3],
            ['name' => 'Los Ríos', 'country_id' => 3],
            ['name' => 'Magallanes y de la Antártica Chilena', 'country_id' => 3],
            ['name' => 'Maule', 'country_id' => 3],
            ['name' => 'Región Metropolitana de Santiago', 'country_id' => 3],
            ['name' => 'Tarapacá', 'country_id' => 3],
            ['name' => 'Valparaíso', 'country_id' => 3],
            

            // Colombia
            ['name' => 'Amazonas', 'country_id' => 4],
            ['name' => 'Antioquia', 'country_id' => 4],
            ['name' => 'Arauca', 'country_id' => 4],
            ['name' => 'Atlántico', 'country_id' => 4],
            ['name' => 'Bogotá', 'country_id' => 4],
            ['name' => 'Bolívar', 'country_id' => 4],
            ['name' => 'Boyacá', 'country_id' => 4],
            ['name' => 'Caldas', 'country_id' => 4],
            ['name' => 'Caquetá', 'country_id' => 4],
            ['name' => 'Casanare', 'country_id' => 4],
            ['name' => 'Cauca', 'country_id' => 4],
            ['name' => 'Cesar', 'country_id' => 4],
            ['name' => 'Chocó', 'country_id' => 4],
            ['name' => 'Córdoba', 'country_id' => 4],
            ['name' => 'Cundinamarca', 'country_id' => 4],
            ['name' => 'Guainía', 'country_id' => 4],
            ['name' => 'Guaviare', 'country_id' => 4],
            ['name' => 'Huila', 'country_id' => 4],
            ['name' => 'La Guajira', 'country_id' => 4],
            ['name' => 'Magdalena', 'country_id' => 4],
            ['name' => 'Meta', 'country_id' => 4],
            ['name' => 'Nariño', 'country_id' => 4],
            ['name' => 'Norte de Santander', 'country_id' => 4],
            ['name' => 'Putumayo', 'country_id' => 4],
            ['name' => 'Quindío', 'country_id' => 4],
            ['name' => 'Risaralda', 'country_id' => 4],
            ['name' => 'San Andrés y Providencia', 'country_id' => 4],
            ['name' => 'Santander', 'country_id' => 4],
            ['name' => 'Sucre', 'country_id' => 4],
            ['name' => 'Tolima', 'country_id' => 4],
            ['name' => 'Valle del Cauca', 'country_id' => 4],
            ['name' => 'Vaupés', 'country_id' => 4],
            ['name' => 'Vichada', 'country_id' => 4],
            

            // Ecuador
            ['name' => 'Azuay', 'country_id' => 5],
            ['name' => 'Bolívar', 'country_id' => 5],
            ['name' => 'Cañar', 'country_id' => 5],
            ['name' => 'Carchi', 'country_id' => 5],
            ['name' => 'Chimborazo', 'country_id' => 5],
            ['name' => 'Cotopaxi', 'country_id' => 5],
            ['name' => 'El Oro', 'country_id' => 5],
            ['name' => 'Esmeraldas', 'country_id' => 5],
            ['name' => 'Galápagos', 'country_id' => 5],
            ['name' => 'Guayas', 'country_id' => 5],
            ['name' => 'Imbabura', 'country_id' => 5],
            ['name' => 'Loja', 'country_id' => 5],
            ['name' => 'Los Ríos', 'country_id' => 5],
            ['name' => 'Manabí', 'country_id' => 5],
            ['name' => 'Morona Santiago', 'country_id' => 5],
            ['name' => 'Napo', 'country_id' => 5],
            ['name' => 'Orellana', 'country_id' => 5],
            ['name' => 'Pastaza', 'country_id' => 5],
            ['name' => 'Pichincha', 'country_id' => 5],
            ['name' => 'Santa Elena', 'country_id' => 5],
            ['name' => 'Santo Domingo de los Tsáchilas', 'country_id' => 5],
            ['name' => 'Sucumbíos', 'country_id' => 5],
            ['name' => 'Tungurahua', 'country_id' => 5],
            ['name' => 'Zamora-Chinchipe', 'country_id' => 5],
            

            // Mexico
            ['name' => 'Aguascalientes', 'country_id' => 6],
            ['name' => 'Baja California', 'country_id' => 6],
            ['name' => 'Baja California Sur', 'country_id' => 6],
            ['name' => 'Campeche', 'country_id' => 6],
            ['name' => 'Chiapas', 'country_id' => 6],
            ['name' => 'Chihuahua', 'country_id' => 6],
            ['name' => 'Coahuila', 'country_id' => 6],
            ['name' => 'Colima', 'country_id' => 6],
            ['name' => 'Durango', 'country_id' => 6],
            ['name' => 'Guanajuato', 'country_id' => 6],
            ['name' => 'Guerrero', 'country_id' => 6],
            ['name' => 'Hidalgo', 'country_id' => 6],
            ['name' => 'Jalisco', 'country_id' => 6],
            ['name' => 'Mexico City', 'country_id' => 6],
            ['name' => 'Mexico State', 'country_id' => 6],
            ['name' => 'Michoacán', 'country_id' => 6],
            ['name' => 'Morelos', 'country_id' => 6],
            ['name' => 'Nayarit', 'country_id' => 6],
            ['name' => 'Nuevo León', 'country_id' => 6],
            ['name' => 'Oaxaca', 'country_id' => 6],
            ['name' => 'Puebla', 'country_id' => 6],
            ['name' => 'Querétaro', 'country_id' => 6],
            ['name' => 'Quintana Roo', 'country_id' => 6],
            ['name' => 'San Luis Potosí', 'country_id' => 6],
            ['name' => 'Sinaloa', 'country_id' => 6],
            ['name' => 'Sonora', 'country_id' => 6],
            ['name' => 'Tabasco', 'country_id' => 6],
            ['name' => 'Tamaulipas', 'country_id' => 6],
            ['name' => 'Tlaxcala', 'country_id' => 6],
            ['name' => 'Veracruz', 'country_id' => 6],
            ['name' => 'Yucatán', 'country_id' => 6],
            ['name' => 'Zacatecas', 'country_id' => 6],
            

            // Peru
            ['name' => 'Amazonas', 'country_id' => 7],
            ['name' => 'Ancash', 'country_id' => 7],
            ['name' => 'Apurímac', 'country_id' => 7],
            ['name' => 'Arequipa', 'country_id' => 7],
            ['name' => 'Ayacucho', 'country_id' => 7],
            ['name' => 'Cajamarca', 'country_id' => 7],
            ['name' => 'Callao', 'country_id' => 7],
            ['name' => 'Cusco', 'country_id' => 7],
            ['name' => 'Huancavelica', 'country_id' => 7],
            ['name' => 'Huánuco', 'country_id' => 7],
            ['name' => 'Ica', 'country_id' => 7],
            ['name' => 'Junín', 'country_id' => 7],
            ['name' => 'La Libertad', 'country_id' => 7],
            ['name' => 'Lambayeque', 'country_id' => 7],
            ['name' => 'Lima', 'country_id' => 7],
            ['name' => 'Loreto', 'country_id' => 7],
            ['name' => 'Madre de Dios', 'country_id' => 7],
            ['name' => 'Moquegua', 'country_id' => 7],
            ['name' => 'Pasco', 'country_id' => 7],
            ['name' => 'Piura', 'country_id' => 7],
            ['name' => 'Puno', 'country_id' => 7],
            ['name' => 'San Martín', 'country_id' => 7],
            ['name' => 'Tacna', 'country_id' => 7],
            ['name' => 'Tumbes', 'country_id' => 7],
            ['name' => 'Ucayali', 'country_id' => 7],


            // Uruguay
            ['name' => 'Artigas', 'country_id' => 8],
            ['name' => 'Canelones', 'country_id' => 8],
            ['name' => 'Cerro Largo', 'country_id' => 8],
            ['name' => 'Colonia', 'country_id' => 8],
            ['name' => 'Durazno', 'country_id' => 8],
            ['name' => 'Flores', 'country_id' => 8],
            ['name' => 'Florida', 'country_id' => 8],
            ['name' => 'Lavalleja', 'country_id' => 8],
            ['name' => 'Maldonado', 'country_id' => 8],
            ['name' => 'Montevideo', 'country_id' => 8],
            ['name' => 'Paysandú', 'country_id' => 8],
            ['name' => 'Río Negro', 'country_id' => 8],
            ['name' => 'Rivera', 'country_id' => 8],
            ['name' => 'Rocha', 'country_id' => 8],
            ['name' => 'Salto', 'country_id' => 8],
            ['name' => 'San José', 'country_id' => 8],
            ['name' => 'Soriano', 'country_id' => 8],
            ['name' => 'Tacuarembó', 'country_id' => 8],
            ['name' => 'Treinta y Tres', 'country_id' => 8],
            

            // Venezuela
            ['name' => 'Amazonas', 'country_id' => 9],
            ['name' => 'Anzoátegui', 'country_id' => 9],
            ['name' => 'Apure', 'country_id' => 9],
            ['name' => 'Aragua', 'country_id' => 9],
            ['name' => 'Barinas', 'country_id' => 9],
            ['name' => 'Bolívar', 'country_id' => 9],
            ['name' => 'Carabobo', 'country_id' => 9],
            ['name' => 'Cojedes', 'country_id' => 9],
            ['name' => 'Delta Amacuro', 'country_id' => 9],
            ['name' => 'Falcón', 'country_id' => 9],
            ['name' => 'Guárico', 'country_id' => 9],
            ['name' => 'Lara', 'country_id' => 9],
            ['name' => 'Mérida', 'country_id' => 9],
            ['name' => 'Miranda', 'country_id' => 9],
            ['name' => 'Monagas', 'country_id' => 9],
            ['name' => 'Nueva Esparta', 'country_id' => 9],
            ['name' => 'Portuguesa', 'country_id' => 9],
            ['name' => 'Sucre', 'country_id' => 9],
            ['name' => 'Táchira', 'country_id' => 9],
            ['name' => 'Trujillo', 'country_id' => 9],
            ['name' => 'Vargas', 'country_id' => 9],
            ['name' => 'Yaracuy', 'country_id' => 9],
            ['name' => 'Zulia', 'country_id' => 9],
            ['name' => 'Distrito Capital', 'country_id' => 9],

        ]);
    }
}

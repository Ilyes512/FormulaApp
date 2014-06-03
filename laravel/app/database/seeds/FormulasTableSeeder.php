<?php

class FormulasTableSeeder extends Seeder
{

    public function run()
    {
        $formulaDataSet = [
            [
                'name' => 'Quadratic Formula',
                'formula' => 'x=\dfrac {-b\pm \sqrt {b^{2}-fac}}{2a}',
                'category_id' => '1',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam consequatur dolores ducimus, esse ex nam odio pariatur possimus praesentium quas quia reprehenderit sed similique sunt unde ut vel voluptate.'
            ],
            [
                'name' => 'The Cauchy-Schwarz Inequality',
                'formula' => '\left( \sum_{k=1}^n a_k b_k \right)^2 \leq \left( \sum_{k=1}^n a_k^2 \right) \left( \sum_{k=1}^n b_k^2 \right)',
                'category_id' => '4',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam consequatur dolores ducimus, esse ex nam odio pariatur possimus praesentium quas quia reprehenderit sed similique sunt unde ut vel voluptate.'
            ],
            [
                'name' => 'A Cross Product Formula',
                'formula' => '\mathbf{V}_1 \times \mathbf{V}_2 =  \begin{vmatrix}\mathbf{i} & \mathbf{j} & \mathbf{k} \\\frac{\partial X}{\partial u} &  \frac{\partial Y}{\partial u} & 0 \\\frac{\partial X}{\partial v} &  \frac{\partial Y}{\partial v} & 0\end{vmatrix}',
                'category_id' => '4',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam consequatur dolores ducimus, esse ex nam odio pariatur possimus praesentium quas quia reprehenderit sed similique sunt unde ut vel voluptate.'
            ],
            [
                'name' => 'An Identity of Ramanujan',
                'formula' => '\frac{1}{\Bigl(\sqrt{\phi \sqrt{5}}-\phi\Bigr) e^{\frac25 \pi}} =1+\frac{e^{-2\pi}} {1+\frac{e^{-4\pi}} {1+\frac{e^{-6\pi}}{1+\frac{e^{-8\pi}} {1+\ldots} } } }',
                'category_id' => '4',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam consequatur dolores ducimus, esse ex nam odio pariatur possimus praesentium quas quia reprehenderit sed similique sunt unde ut vel voluptate.'
            ],
            [
                'name' => 'Break-Even Point',
                'formula' => '\dfrac {FC}{P\ per\ unit - VC\ per\ unit}',
                'category_id' => '3',
                'info' => 'FC = Fixed Costs<br>P = Price<br>VC = Variable Cost'
            ]
        ];

        foreach ($formulaDataSet as $formulaData) {
            $formula = new Formula;
            $formula->fill($formulaData);
            $formula->save();
        }

        // Fill in the pivot table for formula_tag:
        Formula::find(1)->tags()->attach([1, 2]);
        Formula::find(2)->tags()->attach([1, 2, 3, 4]);
        Formula::find(3)->tags()->attach(4);
        Formula::find(5)->tags()->attach(1);
    }

}
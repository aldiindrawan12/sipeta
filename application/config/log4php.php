<?php 
 return  [ 

    'rootLogger'  =>  [ 

        'appenders'  =>  [ 'default' ], 

    ], 

    'appenders'  =>  [ 

        'default'  =>  [ 

            'class'  =>  'LoggerAppenderDailyFile' , 

            'params'  =>  [ 

                'File'  =>  FCPATH  .  'Application/Logs/Log.Informatika-'.date("d-m-Y") , 

            ], 

            'layout'  =>  [ 

                'class'  =>  'LoggerLayoutPattern',

                'params'  => [ 

                    'conversionPattern'  => '%date{Y/m/d H:i:s} [%-5level] %sessionid %msg%n%throwable' , 

                ] 

            ] 

        ] 

    ] 
 ];


 
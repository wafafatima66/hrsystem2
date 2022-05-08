<?php
// leave computation function 

function lwp_points($days)
{
    switch ($days) {
        case 1:
            return ".042";
            break;
        case 2:
            return ".083";
            break;
        case 3:
            return ".125";
            break;
        case 4:
            return ".167";
            break;
        case 5:
            return ".208";
            break;
        case 6:
            return ".250";
            break;
        case 7:
            return ".292";
            break;
        case 8:
            return ".333";
            break;
        case 9:
            return ".375";
            break;
        case 10:
            return ".417";
            break;
        case 11:
            return ".458";
            break;
        case 12:
            return ".5";
            break;
        case 13:
            return ".542";
            break;
        case 14:
            return ".583";
            break;
        case 15:
            return ".625";
            break;
        case 16:
            return ".667";
            break;
        case 17:
            return ".708";
            break;
        case 18:
            return ".750";
            break;
        case 19:
            return ".792";
            break;
        case 20:
            return ".833";
            break;
        case 21:
            return ".875";
            break;
        case 22:
            return ".917";
            break;
        case 23:
            return ".958";
            break;
        case 24:
            return "1";
            break;
        case 25:
            return "1.042";
            break;
        case 26:
            return "1.083";
            break;
        case 27:
            return "1.125";
            break;
        case 28:
            return "1.167";
            break;
        case 29:
            return "1.208";
            break;
        case 30:
            return "1.25";
            break;
        default:
        return "0";
        break;
    }
}

function ut_points($hour, $minute)
{
    $hour_points = 0;
    $minute_points = 0;

    switch ($hour) {
        case 1:
            $hour_points = .125;
            break;
        case 2:
            $hour_points = .250;
            break;
        case 3:
            $hour_points = .375;
            break;
        case 4:
            $hour_points = .500;
            break;
        case 5:
            $hour_points = .625;
            break;
        case 6:
            $hour_points = .750;
            break;
        case 7:
            $hour_points = .875;
            break;
        case 8:
            $hour_points = 1;
            break;
        default:
            $hour_points = 0;
            break;
    }

    switch ($minute) {
        case 1:
            $minute_points = .002;
            break;
        case 2:
            $minute_points = .004;
            break;
        case 3:
            $minute_points = .006;
            break;
        case 4:
            $minute_points = .008;
            break;
        case 5:
            $minute_points = .010;
            break;
        case 6:
            $minute_points = .012;
            break;
        case 7:
            $minute_points = .015;
            break;
        case 8:
            $minute_points = .017;
            break;
        case 9:
            $minute_points = .019;
            break;
        case 10:
            $minute_points = .021;
            break;
        case 11:
            $minute_points = .023;
            break;
        case 12:
            $minute_points = .025;
            break;
        case 13:
            $minute_points = .027;
            break;
        case 14:
            $minute_points = .029;
            break;
        case 15:
            $minute_points = .031;
            break;
        case 16:
            $minute_points = .033;
            break;
        case 17:
            $minute_points = .035;
            break;
        case 18:
            $minute_points = .037;
            break;
        case 19:
            $minute_points = .040;
            break;
        case 20:
            $minute_points = .042;
            break;
        case 21:
            $minute_points = .044;
            break;
        case 22:
            $minute_points = .046;
            break;
        case 23:
            $minute_points = .048;
            break;
        case 24:
            $minute_points = .050;
            break;
        case 25:
            $minute_points = .052;
            break;
        case 26:
            $minute_points = .054;
            break;
        case 27:
            $minute_points = .056;
            break;
        case 28:
            $minute_points = .058;
            break;
        case 29:
            $minute_points = .060;
            break;
        case 30:
            $minute_points = .062;
            break;
        case 31:
            $minute_points = .065;
            break;
        case 32:
            $minute_points = .067;
            break;
        case 33:
            $minute_points = .069;
            break;
        case 34:
            $minute_points = .071;
            break;
        case 35:
            $minute_points = .073;
            break;
        case 36:
            $minute_points = .075;
            break;
        case 37:
            $minute_points = .077;
            break;
        case 38:
            $minute_points = .079;
            break;
        case 39:
            $minute_points = .081;
            break;
        case 40:
            $minute_points = .083;
            break;
        case 41:
            $minute_points = .085;
            break;
        case 42:
            $minute_points = .087;
            break;
        case 43:
            $minute_points = .090;
            break;
        case 44:
            $minute_points = .092;
            break;
        case 45:
            $minute_points = .094;
            break;
        case 46:
            $minute_points = .096;
            break;
        case 47:
            $minute_points = .098;
            break;
        case 48:
            $minute_points = .100;
            break;
        case 49:
            $minute_points = .102;
            break;
        case 50:
            $minute_points = .104;
            break;
        case 51:
            $minute_points = .106;
            break;
        case 52:
            $minute_points = .108;
            break;
        case 53:
            $minute_points = .110;
            break;
        case 54:
            $minute_points = .112;
            break;
        case 55:
            $minute_points = .115;
            break;
        case 56:
            $minute_points = .117;
            break;
        case 57:
            $minute_points = .119;
            break;
        case 58:
            $minute_points = .121;
            break;
        case 59:
            $minute_points = .123;
            break;
        default:
            $minute_points = 0;
            break;
    }


    $points = $hour_points + $minute_points;
    return $points;
}

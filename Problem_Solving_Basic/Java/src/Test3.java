/* @Author : Zulyanto Ilham Nurrahman
 *
 *
 * @Waizly Basic Problem Solve 3 timeConversion
 * */

import java.io.*;
class T3 {
//    Create Method for algorithm Logic
    public static String timeConversion(String s){
        String[] div = s.split(":");
        int jam = Integer.parseInt(div[0]);
        int men = Integer.parseInt(div[1]);
        int det = Integer.parseInt(div[2].substring(0,2));
        String ket = div[2].substring(2);

        if (ket.equals("PM") && jam != 12){
            jam += 12;
        } else if (ket.equals("AM") && jam == 12) {
            jam = 0;
        }
        return String.format("%02d:%02d:%02d", jam, men, det);
    }

}

public class Test3 {
//    Create Main Method for running stdin and call a method timeConversion
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));

        String s = bufferedReader.readLine();

        String result = T3.timeConversion(s);

        System.out.println(result);

        bufferedReader.close();
    }
}


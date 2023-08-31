/* @Author : Zulyanto Ilham Nurrahman
 *
 *
 * @Waizly Basic Problem Solve 2 plusMinus
 * */

import java.io.*;
import java.util.*;

//Saya membuat class di satu file agar mudah menilainya yang mana sebenarnya tidak disarankan hal ini hanya memudahkan untuk testing
class T2 {
//    Create Method
    public static void plusMinus(List<Integer> arr) {
        int n = arr.size();
        int poscount = 0;
        int negcount = 0;
        int zeroCount = 0;

        for (int num : arr) {

            if (num > 0) {
                poscount++;
            } else if (num < 0) {
                negcount++;
            } else {
                zeroCount++;
            }
        }

        double positiveRatio = (double) poscount / n;
        double negativeRatio = (double) negcount / n;
        double zeroRatio = (double) zeroCount / n;

        System.out.printf("%.6f%n", positiveRatio);
        System.out.printf("%.6f%n", negativeRatio);
        System.out.printf("%.6f%n", zeroRatio);

    }

}

public class Test2 {
//    lalu buat method main-nya agar bisa dijalankan
    public static void main(String[] args) throws IOException {
        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(System.in));
        int n = Integer.parseInt(bufferedReader.readLine().trim());

        String[] arrTemp = bufferedReader.readLine().replaceAll("\\s+$", "").split(" ");

        List<Integer> arr = new ArrayList<>();

        for (int i = 0; i < n; i++) {
            int arrItem = Integer.parseInt(arrTemp[i]);
            arr.add(arrItem);
        }
//        call static Method
        T2.plusMinus(arr);

        bufferedReader.close();
    }
}
